function display_networth(networth) {
    $(".networth span").text("N " + networth);
}

function display_asset(asset) {
    $(".assets span").text("N " + asset);
}

function display_liability(liability) {
    $(".liability span").text("N " + liability);
}

function get_items(type) {
    axios.get('get-items.php', {
            params: {
                user_id: 3,
                type: type,
            }
        })
        .then(function (response) {
            var res = response.data;
            console.log(res);
            if (res.status == "success") {
                // update the networth in view
                if (res.type == "liability") {
                    display_liability(res.liability);
                } else if (res.type == "asset") {
                    display_asset(res.asset);
                }
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}


function calculate() {
    alert("calaculating!!!");
    axios.get('get-saved-networth.php', {
            params: {
                user_id: 3,
            }
        })
        .then(function (response) {
            networth = response.data;
            console.log(networth);
            $(".networth span").text("N " + networth);
        })
        .catch(function (error) {
            console.log(error);
        })
        .finally(function () {
            return networth;
        });
}

function get_networth() {
    axios.get('get-networth.php', {
            params: {
                user_id: 3,
            }
        })
        .then(function (response) {
            var res = response.data;
            console.log(res);
            display_networth(res.value);
        })
        .catch(function (error) {
            console.log(error);
        });
}

function update_networth() {
    axios.get('update-networth.php', {
            params: {
                user_id: 3,
                networth: calculate(), // this should be the calculated value
            }
        })
        .then(function (response) {
            var res = response.data;
            console.log(res);
            if (res.status == "success") {
                // update the networth in view
                get_networth();
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}