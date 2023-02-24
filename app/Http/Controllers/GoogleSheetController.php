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
        // $spreadSheetId = "1OUYy0xmCqU6rgcBQEElvMchqEeeM60q8ePtfEc_jBmM";
        $spreadSheetDetails = Sheets::spreadsheet($spreadSheetId)->sheet($spreadSheetName)->get();
        $header = $spreadSheetDetails->pull(0);
        $values = Sheets::collection($header, $spreadSheetDetails);
        $values = $values->toArray();
        // dd($values);
        return [$header , $values  ];
        // $permissions = Sheets::spreadsheet('1OUYy0xmCqU6rgcBQEElvMchqEeeM60q8ePtfEc_jBmM')->permissions()        
        

    }

    public function get_sheet_page()
    {   
            $spreadSheet = auth()->user()->sheet->last();
            $spreadSheetId = $spreadSheet->spread_sheet_id;
            $spreadSheetName = $spreadSheet->name; 
            // dd($spreadSheet);
            $sheetData = $this->get_sheet_details($spreadSheetId , $spreadSheetName );
            $header = $sheetData[0];
            $spreadSheetDetails = $sheetData[1]; 
            return view('spreadsheet.spreadsheet')->with(['header' => $header , 'rows' => $spreadSheetDetails]);
    }

    public function check_user_in_spreadsheet()
    {   //this code helps to get the users that are added in the spread sheet
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
            //do what ever you want to do
        }
    }

    public function get_sheet_data(){
        $spreadSheet = auth()->user()->sheet->last();
        $spreadSheetId = $spreadSheet->spread_sheet_id;
        $spreadSheetName = $spreadSheet->name; 
        $sheetData = $this->get_sheet_details($spreadSheetId, $spreadSheetName);
        // $header = array_shift($spreadSheetDetails);
        $header = $sheetData[0];
        $spreadSheetDetails = $sheetData[1];
        return view('spreadsheet.components.table')->with(['header' => $header , 'rows' => $spreadSheetDetails]);
    }

    public function list_add_user_in_spreadsheet(Request $request)
    {
        try{
            $spreadSheetId = $request->spreadSheetId;
            $userId = $request->userId;
            $spreadSheet = $this->add_user_in_spreadsheet($spreadSheetId , $userId);
            if($spreadSheet)
            {
                return response()->json(['success' => true , 'msg' => 'User Added In Spread Sheet']);
            }
            else
            {
                return response()->json(['success' => false , 'msg' => $e->getMessage()]);    
            }
        }
        catch(Exception $e)
        {
            return response()->json(['success' => false , 'msg' => $e->getMessage()]);
        }
    }

    public function mail_add_user_in_spreadsheet(Request $request)
    {
            $spreadSheetId = $request->spreadSheetId;
            $userId = $request->userId;
            $spreadSheet = $this->add_user_in_spreadsheet($spreadSheetId , $userId);
    }

    public function add_user_in_spreadsheet(Request $request)
    {
        
        $spreadSheet = SpreadSheetUser::insert([
                            'spreadsheet_id' => $spreadSheetId,
                            'user_id' => $userId,
                        ]);
        return $spreadSheet;
    }


}
