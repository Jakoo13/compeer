<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LinensNThingsPlatforms;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LinensNThingsPlatformsController extends Controller
{
    public function index()
    {
        return Platform::all();
    }
 
    public function show($id)
    {
        return LinensNThingsPlatforms::find($id);
    }
    
	public function store(Request $request, $id)
    {
        $user=User::find($id);
        

        return LinensNThingsPlatforms::create([
            'id' => $user->id,
            'onePassword' => $request['onePassword'],
            'email' => $request['email'],
            'slack' => $request['slack'],
            'divvy' => $request['divvy'],
            'paycom' => $request['paycom'],
            'quadpay' => $request['quadpay'],
            'quickbooks' => $request['quickbooks'],
            'riskified' => $request['riskified'],
            'stripe' => $request['stripe'],
            'facebookBusinessManager' => $request['facebookBusinessManager'],
            'facebookPageAdmin' => $request['facebookPageAdmin'],
            'googleAnalytics' => $request['googleAnalytics'],
            'googleAds' => $request['googleAds'],
            'googleAdSense' => $request['googleAdSense'],
            'googleMerchantCenter' => $request['googleMerchantCenter'],
            'googleMyBusiness' => $request['googleMyBusiness'],
            'googlePostmasterTools' => $request['googlePostmasterTools'],
            'googleSearchConsole' => $request['googleSearchConsole'],
            'googleTagManager' => $request['googleTagManager'],
            'bingSearchConsole' => $request['bingSearchConsole'],
            'microsoftPostmasterTools' => $request['microsoftPostmasterTools'],
            'microsoftPowerbi' => $request['microsoftPowerbi'],
            'microsoftAdvertising' => $request['microsoftAdvertising'],
            'automizely' => $request['automizely'],
            'crazyegg' => $request['crazyegg'],
            'findify' => $request['findify'],
            'hyros' => $request['hyros'],
            'kickbox' => $request['kickbox'],
            'taboola' => $request['taboola'],
            'taggbox' => $request['taggbox'],
            'tapcart' => $request['tapcart'],
            'attentive' => $request['attentive'],
            'aircall' => $request['aircall'],
            'docusign' => $request['docusign'],
            'dropbox' => $request['dropbox'],
            'gorgias' => $request['gorgias'],
            'klaviyo' => $request['klaviyo'],
            'monday' => $request['monday'],
            'revcascade' => $request['revcascade'],
            'shiphero' => $request['shiphero'],
            'shopify' => $request['shopify'],
            'todoist' => $request['todoist'],
            'tradefull' => $request['tradefull'],
            'appleDeveloperConsole' => $request['appleDeveloperConsole'],
            'database' => $request['database'],
            'github' => $request['github'],
            'googleDeveloperConsole' => $request['googleDeveloperConsole'],
            'jira' => $request['jira'],
            'octopus' => $request['octopus'],
            'server' => $request['server'],
            'sendgrid' => $request['sendgrid'],
            'twilio' => $request['twilio'],
            'amazonBrandRegistry' => $request['amazonBrandRegistry'],
            'amazonSellerCentral' => $request['amazonSellerCentral'],
            'ebay' => $request['ebay'],
            'walmart' => $request['walmart'],
            'instagram' => $request['instagram'],
            'pinterest' => $request['pinterest'],
            'rakuten' => $request['rakuten'],
            'twitter' => $request['twitter'],
            'youtube' => $request['youtube'],
            'filevista' => $request['filevista'],
            'salesforce' => $request['salesforce'],
            'upwork' => $request['upwork']
        ]);
    }

	public function update(Request $request, $id)
    {
        $platform = LinensNThingsPlatforms::findOrFail($id);
        $platform->update($request->all());
	    return $platform;
    }
	public function delete(Request $request, $id)
    {
        $platform = LinensNThingsPlatforms::findOrFail($id);
        $platform->delete();
	    return 204;
    }
}
