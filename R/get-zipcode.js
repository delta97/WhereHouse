function getZipcode($address){
    if(!empty($address)){
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=true_or_false&key=AIzaSyBwc9cyQMydx3_urDo__3nyGymjS8hmqnE'); 
        $output1 = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        $latitude  = $output1->results[0]->geometry->location->lat; 
        $longitude = $output1->results[0]->geometry->location->lng;
        //Send request and receive json data by latitude longitute
        $geocodeFromLatlon = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$latitude.','.$longitude.'&sensor=true_or_false');
        $output2 = json_decode($geocodeFromLatlon);
        if(!empty($output2)){
            $addressComponents = $output2->results[0]->address_components;
            foreach($addressComponents as $addrComp){
                if($addrComp->types[0] == 'postal_code'){
                    //Return the zipcode
                    return $addrComp->long_name;
                }
            }
            return false;
        }else{
            return false;
        }
    }else{
        return false;   
    }
}