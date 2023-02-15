<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sheets;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Sheets;


class GoogleSheetController extends Controller
{
    public function get_sheet_details($spreadSheetId , $spreadSheetName)
    {

        $spreadSheetId = "1OUYy0xmCqU6rgcBQEElvMchqEeeM60q8ePtfEc_jBmM";
        $spreadSheetDetails = Sheets::spreadsheet($spreadSheetId)->sheet($spreadSheetName)->get();
        $header = $spreadSheetDetails->pull(0);
        $values = Sheets::collection($header, $spreadSheetDetails);
        $values = $values->toArray();
        return $values;
        // $permissions = Sheets::spreadsheet('1OUYy0xmCqU6rgcBQEElvMchqEeeM60q8ePtfEc_jBmM')->permissions()        
        

    }

    public function get_sheet_page()
    {
        $spreadSheetId = "1OUYy0xmCqU6rgcBQEElvMchqEeeM60q8ePtfEc_jBmM";
        $client = new Google_Client();
        $client->setApplicationName('broker-buds');
        $client->setScopes([Google_Service_Sheets::SPREADSHEETS, Google_Service_Drive::DRIVE]);
        $client->setAuthConfig(storage_path('broker-buds-337ff00c2a16.json'));
        $client->setAccessType('offline');
        $service = new Google_Service_Drive($client);

        $permissions = $service->permissions->listPermissions($spreadSheetId, ['fields' => 'nextPageToken,permissions(emailAddress,role)']);

        $emailAddress = [];

        foreach ($permissions->permissions as $permission) {
            $emailAddress[] =  $permission->getEmailAddress();
        }


        if(in_array(auth()->user()->email , $emailAddress))
        {

            $spreadSheetDetails = $this->get_sheet_details($spreadSheetId , 'Demo');
        
            $header = array_shift($spreadSheetDetails);

            return view('spreadsheet.spreadsheet')->with(['header' => $header , 'rows' => $spreadSheetDetails]);
        }else{
            return redirect()->route('admin.dashboard');
        }
    }

    public function get_sheet_data(){
        $spreadSheetId = "1OUYy0xmCqU6rgcBQEElvMchqEeeM60q8ePtfEc_jBmM";
        $spreadSheetDetails = $this->get_sheet_details($spreadSheetId , 'Demo');
        $header = array_shift($spreadSheetDetails);
        return view('spreadsheet.components.table')->with(['header' => $header , 'rows' => $spreadSheetDetails]);
    }


}
