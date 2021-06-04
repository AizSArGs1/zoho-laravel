<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Asciisd\Zoho\Facades\ZohoManager;
use zcrmsdk\crm\crud\ZCRMRecord;
use zcrmsdk\crm\setup\restclient\ZCRMRestClient;
use zcrmsdk\oauth\ZohoOAuth;




class ConvertToDeal extends Controller
{
    public function run($id){
        $leads = ZohoManager::useModule('Deals');
        $record=ZCRMRecord::getInstance("Deals",null);  //To get ZCRMRecord instance
        $record->setFieldValue("Deal_Name","Shuvar"); //This function use to set FieldApiName and value similar to all other FieldApis and Custom field
        $record->setFieldValue("Closing_Date","2022-03-30"); //This function is for Invoices moduleClosing_Date
        $record->setFieldValue("Stage","Needs Analysis");
        $record->create()->getData();
        echo '<pre>' .
            print_r($record, true) .
            '</pre>';
    }

}
