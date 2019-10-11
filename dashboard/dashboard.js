function store_networth() {
    var user_id = $("#userid").val();
    var networth = $("#_networth").text();
    var asset = $("#assetSum").text();
    var liability = $("#liabilitySum").text().slice(1);

    // console.log(networth);
    // console.log(asset);
    // console.log(liability);

    axios.get('./dashboard/store-networth.php', {
            params: {
                user_id: Number(user_id),
                networth: Number(networth),
                asset: Number(asset),
                liability: Number(liability)
            }
        })
        .then(function (response) {
            var res = response.data;
            console.log(res);
            if (res.status == "success") {
                console.log(res.message);
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}

function get_networth() {
    var user_id = $("#userid").val();
    axios.get('./dashboard/get-networth.php', {
            params: {
                user_id: Number(user_id),
            }
        })
        .then(function (response) {
            var res = response.data;
            console.log("Getting Networth");
            console.log(res);
            if (res.status == "success") {
                display_networth(res.value);
                display_asset(res.asset);
                display_liability(res.liability);
            } else {
                console.log("Error !!! Get Networth");
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}

function display_networth(networth) {
    $("#_networth").text(Number(networth).toFixed(2));
}

function display_asset(asset) {
    $("#assetSum").text(Number(asset).toFixed(2));
}

function display_liability(liability) {
    $("#liabilitySum").text("-" + Number(liability).toFixed(2));
}


function store_item(input) {
    var user_id = $("#userid").val();
    var type = input.target.className;
    var name = input.target.name;
    var value = input.target.value;

    if (type == '_liability') {
        type = 'liability';
    }

    if (value == '' || value == null) {
        value = 0;
    }

    axios.get('./dashboard/store-item.php', {
            params: {
                user_id: user_id,
                type: type,
                name: name,
                value: value,
            }
        })
        .then(function (response) {
            console.log(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });
}


function get_items() {
    var user_id = $("#userid").val();

    axios.get('./dashboard/get-items.php', {
            params: {
                user_id: user_id,
            }
        })
        .then(function (response) {
            var items = response.data.items;
            console.log("Getting Items");
            console.log(response.data);
            for (var i = 0; i < items.length; i++) {
                var value = items[i].value;
                if (value == '' || value == null) {
                    value = 0;
                }
                document.getElementsByName(items[i].name)[0].value = value;
            }
            inputValidate();
            liabilityValidate();
            displayNetworth();
        })
        .catch(function (error) {
            console.log(error);
        });
}


function get_chart_data() {
    var user_id = $("#userid").val();
    axios.get('./dashboard/get-chart-data.php', {
            params: {
                user_id: Number(user_id),
            }
        })
        .then(function (response) {
            var res = response.data;
            console.log("Getting Chart Data");
            if (res.status == "error") {
                console.log("error!!!");
            } else {
                console.log(res);
                var chart = new CanvasJS.Chart("chartContainer", {
                    theme: "dark1", // "light2", "dark1", "dark2"
                    animationEnabled: true, // change to true		
                    title: {
                        text: "NetWorth Chart"
                    },
                    data: [{
                        // Change type to "bar", "area", "spline", "pie",etc.
                        type: "column",
                        dataPoints: res.data
                    }]
                });
                // chart.render();

                var chart2 = new CanvasJS.Chart("chartContainer", {
                    theme: "dark1", // "light2", "dark1", "dark2"
                    animationEnabled: true, // change to true
                    title: {
                        text: "NetWorth Chart"
                    },
                    data: [ //array of dataSeries     
                        { 
                            /*** Change type "column" to "bar", "area", "line" or "pie"***/
                            type: "column",
                            name: "Assets",
                            showInLegend: true,
                            dataPoints: res.asset
                        },
                        {
                            type: "column",
                            name: "Liability",
                            showInLegend: true,
                            dataPoints: res.liability
                        }
                    ]
                });
                chart2.render();

            }
        })
        .catch(function (error) {
            console.log(error);
        });
}