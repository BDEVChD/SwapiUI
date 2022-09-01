<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StarController extends Controller
{
    public function show($category = null, $itemDetail = null)
    {
        $endpoint = "https://swapi.dev/api/";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint);

        if($category )
        {
            if($itemDetail)
            {
                $result = $this->parseItemDetail($category, $itemDetail, $endpoint); 
                return view('details', ['results' => $result, 'category' => $category]); 
            } 
            $results = $this->parseCategory($category, $endpoint);  
        } 

        $content = json_decode($response->getBody(), true);

        return view('results', ['results' => $results ?? '', 'content' => $content ?? '', 'category' => $category]);
    }

    protected function search()
    {
        return view('itemresult'); 
    }

    protected function parseCategory($category, $endpoint)
    {
        $results = Http::get($endpoint . $category)->json()['results'];
        $parsedResults = []; 
        foreach($results as $result){
            if($result['url']){
                $id = explode('/', $result['url']);
                $result['category'] = $id[4]; 
                $result['id'] = $id[5]; 
                $parsedResults[] = $result; 
            } 
        } 
        return $parsedResults; 
    }

    protected function parseItemDetail($category, $itemDetail, $endpoint)
    {
        $endpoint = $endpoint . $category .'/' . $itemDetail;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint);
        $data = json_decode($response->getBody(), true);
        $results = [];
        
        foreach($data as $key => $value){
            $newKey = str_replace("_"," ",$key);
            $key = ucwords($newKey); 
            $results[$key] = $value; 
        }

        return $results; 
    }
}
