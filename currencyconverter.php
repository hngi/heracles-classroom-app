   $amount_input = filter_input(INPUT_POST, 'amount_input');
                $currency1 = filter_input(INPUT_POST, 'currency1');
                $currency2 = filter_input(INPUT_POST, 'currency2');

                $currencies = array();
                $currencies['NGN'] = array(
                    'NGN' => 1,
                    'EUR' => 0.0025,
                    'GBP' => 0.0023,
                    'USD' => 0.0028
                );

                $amount_output = $amount_input*$currencies[$currency1][$currency2];
