<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pier1Platforms extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'onePassword',
        'email',
        'slack',
        'divvy',
        'paycom',
        'quadpay',
        'quickbooks',
        'riskified',
        'stripe',
        'facebookBusinessManager',
        'facebookPageAdmin',
        'googleAnalytics',
        'googleAds',
        'googleAdSense',
        'googleMerchantCenter',
        'googleMyBusiness',
        'googlePostmasterTools',
        'googleSearchConsole',
        'googleTagManager',
        'bingSearchConsole',
        'microsoftPostmasterTools',
        'microsoftPowerbi',
        'microsoftAdvertising',
        'automizely',
        'crazyegg',
        'findify',
        'hyros',
        'kickbox',
        'taboola',
        'taggbox',
        'tapcart',
        'attentive',
        'aircall',
        'docusign',
        'dropbox',
        'gorgias',
        'klaviyo',
        'monday',
        'revcascade',
        'shiphero',
        'shopify',
        'todoist',
        'tradefull',
        'appleDeveloperConsole',
        'database',
        'github',
        'googleDeveloperConsole',
        'jira',
        'octopus',
        'server',
        'sendgrid',
        'twilio',
        'amazonBrandRegistry',
        'amazonSellerCentral',
        'ebay',
        'walmart',
        'instagram',
        'pinterest',
        'rakuten',
        'twitter',
        'youtube',
        'filevista',
        'salesforce',
        'upwork'

    ];
}
