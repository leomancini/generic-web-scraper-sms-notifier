<?php
    function get($responseType, $url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true);

        if ($responseType === 'JSON') {
            return json_decode($response, true);
        } else {
            return $response;
        }
    }

	function getInfo() {
        $url = '';
        $response = get('JSON', $url);

        // Logic to parse JSON

        return Array();
	}

	function getInfoMultiple() {
        $instances = [];

        foreach ($instances as &$instance) {
            $data = getInfo();

            // Populate instances with data
            $instance['field1'] = $data['field1'];
            $instance['field2'] = $data['field2'];
            $instance['field3'] = $data['field3'];
        }

        return json_encode($instances);
	}
?>