<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePier1PlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pier1_platforms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('onePassword')->default('0')->nullable();
            $table->boolean('email')->default('0')->nullable();
            $table->boolean('slack')->default('0')->nullable();
            $table->boolean('divvy')->default('0')->nullable();
            $table->boolean('paycom')->default('0')->nullable();
            $table->boolean('quadpay')->default('0')->nullable();
            $table->boolean('quickbooks')->default('0')->nullable();
            $table->boolean('riskified')->default('0')->nullable();
            $table->boolean('stripe')->default('0')->nullable();
            $table->boolean('facebookBusinessManager')->default('0')->nullable();
            $table->boolean('facebookPageAdmin')->default('0')->nullable();
            $table->boolean('googleAnalytics')->default('0')->nullable();
            $table->boolean('googleAds')->default('0')->nullable();
            $table->boolean('googleAdSense')->default('0')->nullable();
            $table->boolean('googleMerchantCenter')->default('0')->nullable();
            $table->boolean('googleMyBusiness')->default('0')->nullable();
            $table->boolean('googlePostmasterTools')->default('0')->nullable();
            $table->boolean('googleSearchConsole')->default('0')->nullable();
            $table->boolean('googleTagManager')->default('0')->nullable();
            $table->boolean('bingSearchConsole')->default('0')->nullable();
            $table->boolean('microsoftPostmasterTools')->default('0')->nullable();
            $table->boolean('microsoftPowerbi')->default('0')->nullable();
            $table->boolean('microsoftAdvertising')->default('0')->nullable();
            $table->boolean('automizely')->default('0')->nullable();
            $table->boolean('crazyegg')->default('0')->nullable();
            $table->boolean('findify')->default('0')->nullable();
            $table->boolean('hyros')->default('0')->nullable();
            $table->boolean('kickbox')->default('0')->nullable();
            $table->boolean('taboola')->default('0')->nullable();
            $table->boolean('taggbox')->default('0')->nullable();
            $table->boolean('tapcart')->default('0')->nullable();
            $table->boolean('attentive')->default('0')->nullable();
            $table->boolean('aircall')->default('0')->nullable();
            $table->boolean('docusign')->default('0')->nullable();
            $table->boolean('dropbox')->default('0')->nullable();
            $table->boolean('gorgias')->default('0')->nullable();
            $table->boolean('klaviyo')->default('0')->nullable();
            $table->boolean('monday')->default('0')->nullable();
            $table->boolean('revcascade')->default('0')->nullable();
            $table->boolean('shiphero')->default('0')->nullable();
            $table->boolean('shopify')->default('0')->nullable();
            $table->boolean('todoist')->default('0')->nullable();
            $table->boolean('tradefull')->default('0')->nullable();
            $table->boolean('appleDeveloperConsole')->default('0')->nullable();
            $table->boolean('database')->default('0')->nullable();
            $table->boolean('github')->default('0')->nullable();
            $table->boolean('googleDeveloperConsole')->default('0')->nullable();
            $table->boolean('jira')->default('0')->nullable();
            $table->boolean('octopus')->default('0')->nullable();
            $table->boolean('server')->default('0')->nullable();
            $table->boolean('sendgrid')->default('0')->nullable();
            $table->boolean('twilio')->default('0')->nullable();
            $table->boolean('amazonBrandRegistry')->default('0')->nullable();
            $table->boolean('amazonSellerCentral')->default('0')->nullable();
            $table->boolean('ebay')->default('0')->nullable();
            $table->boolean('walmart')->default('0')->nullable();
            $table->boolean('instagram')->default('0')->nullable();
            $table->boolean('pinterest')->default('0')->nullable();
            $table->boolean('rakuten')->default('0')->nullable();
            $table->boolean('twitter')->default('0')->nullable();
            $table->boolean('youtube')->default('0')->nullable();
            $table->boolean('filevista')->default('0')->nullable();
            $table->boolean('salesforce')->default('0')->nullable();
            $table->boolean('upwork')->default('0')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pier1_platforms');
    }
}
