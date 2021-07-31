<template>
    <div>
        <button type="button" @click="editPlatforms" class="col-1btn btn-danger px-4 my-2" :style='{"display": (isDisplayed?"block" : "none")}'>Edit</button>
        <form @submit.prevent="uploadUsersPlatforms()" >
        <fieldset :disabled="formDisabled">
            <div class="form-row justify-content-left py-2 " style="background-color:rgba(143, 143, 160, 0.308);">
                <h4 class="pr-3 col-2 font-weight-bold text-dark pl-2">All Staff</h4>
                <div class="col-10">
                    <div class="column form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" v-model="form.onePassword">
                        <label class="form-check-label" >1Password</label>
                        <div v-if="form.errors.has('onePassword')" v-html="form.errors.get('onePassword')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.email" >
                        <label class="form-check-label" >{{this.brand | upText }} Email</label>
                        <div v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.slack">
                        <label class="form-check-label" >Slack</label>
                        <div v-if="form.errors.has('slack')" v-html="form.errors.get('slack')" />
                    </div>
                </div>
            </div>
            
            <div class="form-row justify-content-left py-2">
                <h4 class="pr-3 col-2 font-weight-bold  pl-2">Accounting</h4>
                <div class="col-10">
                    <div class="column form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" v-model="form.divvy">
                        <label class="form-check-label" >Divvy</label>
                        <div v-if="form.errors.has('divvy')" v-html="form.errors.get('divvy')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.paycom" >
                        <label class="form-check-label" >Paycom</label>
                        <div v-if="form.errors.has('paycom')" v-html="form.errors.get('paycom')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.quadpay">
                        <label class="form-check-label" >Quadpay</label>
                        <div v-if="form.errors.has('quadpay')" v-html="form.errors.get('quadpay')" />
                    </div>
                    <div class="column form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" v-model="form.quickbooks">
                        <label class="form-check-label" >Quickbooks</label>
                        <div v-if="form.errors.has('quickbooks')" v-html="form.errors.get('quickbooks')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.riskified" >
                        <label class="form-check-label" >Riskified</label>
                        <div v-if="form.errors.has('riskified')" v-html="form.errors.get('riskified')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.stripe">
                        <label class="form-check-label" >Stripe</label>
                        <div v-if="form.errors.has('stripe')" v-html="form.errors.get('stripe')" />
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-left py-2 " style="background-color:rgba(143, 143, 160, 0.308);">
                <h4 class="pr-3 col-2 font-weight-bold text-dark pl-2">Facebook</h4>
                <div class="col=10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.facebookBusinessManager" >
                        <label class="form-check-label" >Facebook Business Manager</label>
                        <div v-if="form.errors.has('facebookBusinessManager')" v-html="form.errors.get('facebookBusinessManager')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.facebookPageAdmin">
                        <label class="form-check-label" >Facebook Page Admin</label>
                        <div v-if="form.errors.has('facebookPageAdmin')" v-html="form.errors.get('facebookPageAdmin')" />
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-left py-2">
                <h4 class="pr-3 col-2 font-weight-bold pl-2">Google</h4>
                <div class="col-10">
                    <div class="column form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" v-model="form.googleAnalytics">
                        <label class="form-check-label" >Google Analytics</label>
                        <div v-if="form.errors.has('googleAnalytics')" v-html="form.errors.get('googleAnalytics')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.googleAds" >
                        <label class="form-check-label" >Google Ads</label>
                        <div v-if="form.errors.has('googleAds')" v-html="form.errors.get('googleAds')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.googleAdSense">
                        <label class="form-check-label" >Google Ad Sense</label>
                        <div v-if="form.errors.has('googleAdSense')" v-html="form.errors.get('googleAdSense')" />
                    </div>
                    <div class="column form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" v-model="form.googleMerchantCenter">
                        <label class="form-check-label" >Google Merchant Center</label>
                        <div v-if="form.errors.has('googleMerchantCenter')" v-html="form.errors.get('googleMerchantCenter')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.googleMyBusiness" >
                        <label class="form-check-label" >Google My Business</label>
                        <div v-if="form.errors.has('googleMyBusiness')" v-html="form.errors.get('googleMyBusiness')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.googlePostmasterTools">
                        <label class="form-check-label" >Google Postmaster Tools</label>
                        <div v-if="form.errors.has('googlePostmasterTools')" v-html="form.errors.get('googlePostmasterTools')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.googleSearchConsole" >
                        <label class="form-check-label" >Google Search Console</label>
                        <div v-if="form.errors.has('googleSearchConsole')" v-html="form.errors.get('googleSearchConsole')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.googleTagManager">
                        <label class="form-check-label" >Google Tag Manager</label>
                        <div v-if="form.errors.has('googleTagManager')" v-html="form.errors.get('googleTagManager')" />
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-left py-2 " style="background-color:rgba(143, 143, 160, 0.308);">
                <h4 class="pr-3 col-2 font-weight-bold text-dark pl-2">Microsoft</h4>
                <div class="col-10">
                    <div class="column form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" v-model="form.bingSearchConsole">
                        <label class="form-check-label" >Bing Search Console</label>
                        <div v-if="form.errors.has('bingSearchConsole')" v-html="form.errors.get('bingSearchConsole')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.microsoftPostmasterTools" >
                        <label class="form-check-label" >Microsoft Postmaster Tools</label>
                        <div v-if="form.errors.has('microsoftPostmasterTools')" v-html="form.errors.get('microsoftPostmasterTools')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.microsoftPowerbi">
                        <label class="form-check-label" >Microsoft Powerbi</label>
                        <div v-if="form.errors.has('microsoftPowerbi')" v-html="form.errors.get('microsoftPowerbi')" />
                    </div>
                    <div class="column form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" v-model="form.microsoftAdvertising">
                        <label class="form-check-label" >Microsoft Advertising</label>
                        <div v-if="form.errors.has('microsoftAdvertising')" v-html="form.errors.get('microsoftAdvertising')" />
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-left py-2">
                <h4 class="pr-3 col-2 font-weight-bold pl-2">Misc</h4>
                <div class="col-10">
                    <div class="column form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" v-model="form.automizely">
                        <label class="form-check-label" >Automizely</label>
                        <div v-if="form.errors.has('automizely')" v-html="form.errors.get('automizely')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.crazyegg" >
                        <label class="form-check-label" >Crazyegg</label>
                        <div v-if="form.errors.has('crazyegg')" v-html="form.errors.get('crazyegg')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.findify">
                        <label class="form-check-label" >Findify</label>
                        <div v-if="form.errors.has('findify')" v-html="form.errors.get('findify')" />
                    </div>
                    <div class="column form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" v-model="form.hyros">
                        <label class="form-check-label" >Hyros</label>
                        <div v-if="form.errors.has('hyros')" v-html="form.errors.get('hyros')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.kickbox" >
                        <label class="form-check-label" >Kickbox</label>
                        <div v-if="form.errors.has('kickbox')" v-html="form.errors.get('kickbox')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.taboola">
                        <label class="form-check-label" >Taboola</label>
                        <div v-if="form.errors.has('taboola')" v-html="form.errors.get('taboola')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.taggbox" >
                        <label class="form-check-label" >Taggbox</label>
                        <div v-if="form.errors.has('taggbox')" v-html="form.errors.get('taggbox')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.tapcart">
                        <label class="form-check-label" >Tapcart</label>
                        <div v-if="form.errors.has('tapcart')" v-html="form.errors.get('tapcart')" />
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-left py-2 " style="background-color:rgba(143, 143, 160, 0.308);">
                <h4 class="pr-3 col-2 font-weight-bold text-dark pl-2">Operations</h4>
                <div class="col-10">
                    <div class="column form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" v-model="form.attentive">
                        <label class="form-check-label" >Attentive</label>
                        <div v-if="form.errors.has('attentive')" v-html="form.errors.get('attentive')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.aircall" >
                        <label class="form-check-label" >Aircall</label>
                        <div v-if="form.errors.has('aircall')" v-html="form.errors.get('aircall')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.docusign">
                        <label class="form-check-label" >Docusign</label>
                        <div v-if="form.errors.has('docusign')" v-html="form.errors.get('docusign')" />
                    </div>
                    <div class="column form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" v-model="form.dropbox">
                        <label class="form-check-label" >Dropbox</label>
                        <div v-if="form.errors.has('dropbox')" v-html="form.errors.get('dropbox')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.gorgias" >
                        <label class="form-check-label" >Gorgias</label>
                        <div v-if="form.errors.has('gorgias')" v-html="form.errors.get('gorgias')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.klaviyo">
                        <label class="form-check-label" >Klaviyo</label>
                        <div v-if="form.errors.has('klaviyo')" v-html="form.errors.get('klaviyo')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.monday" >
                        <label class="form-check-label" >Monday</label>
                        <div v-if="form.errors.has('monday')" v-html="form.errors.get('monday')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.revcascade">
                        <label class="form-check-label" >Revcascade</label>
                        <div v-if="form.errors.has('revcascade')" v-html="form.errors.get('revcascade')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.shiphero" >
                        <label class="form-check-label" >Shiphero</label>
                        <div v-if="form.errors.has('shiphero')" v-html="form.errors.get('shiphero')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.shopify">
                        <label class="form-check-label" >Shopify</label>
                        <div v-if="form.errors.has('shopify')" v-html="form.errors.get('shopify')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.todoist" >
                        <label class="form-check-label" >Todoist</label>
                        <div v-if="form.errors.has('todoist')" v-html="form.errors.get('todoist')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.tradefull">
                        <label class="form-check-label" >Tradefull</label>
                        <div v-if="form.errors.has('tradefull')" v-html="form.errors.get('tradefull')" />
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-left py-2">
                <h4 class="pr-3 col-2 font-weight-bold pl-2">Programmers</h4>
                <div class="col-10">
                    <div class="column form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" v-model="form.appleDeveloperConsole">
                        <label class="form-check-label" >Apple Developer Console</label>
                        <div v-if="form.errors.has('appleDeveloperConsole')" v-html="form.errors.get('appleDeveloperConsole')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.database" >
                        <label class="form-check-label" >Database</label>
                        <div v-if="form.errors.has('database')" v-html="form.errors.get('database')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.github">
                        <label class="form-check-label" >Github</label>
                        <div v-if="form.errors.has('github')" v-html="form.errors.get('github')" />
                    </div>
                    <div class="column form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" v-model="form.googleDeveloperConsole">
                        <label class="form-check-label" >Google Developer Console</label>
                        <div v-if="form.errors.has('googleDeveloperConsole')" v-html="form.errors.get('googleDeveloperConsole')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.jira" >
                        <label class="form-check-label" >Jira</label>
                        <div v-if="form.errors.has('jira')" v-html="form.errors.get('jira')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.octopus">
                        <label class="form-check-label" >Octopus</label>
                        <div v-if="form.errors.has('octopus')" v-html="form.errors.get('octopus')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.server" >
                        <label class="form-check-label" >Server</label>
                        <div v-if="form.errors.has('server')" v-html="form.errors.get('server')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.sendgrid">
                        <label class="form-check-label" >Sendgrid</label>
                        <div v-if="form.errors.has('sendgrid')" v-html="form.errors.get('sendgrid')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.twilio">
                        <label class="form-check-label" >Twilio</label>
                        <div v-if="form.errors.has('twilio')" v-html="form.errors.get('twilio')" />
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-left py-2 " style="background-color:rgba(143, 143, 160, 0.308);">
                <h4 class="pr-3 col-2 font-weight-bold text-dark pl-2">Sales Channels</h4>
                <div class="col-10">
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.amazonBrandRegistry">
                        <label class="form-check-label" >Amazon Brand Registry</label>
                        <div v-if="form.errors.has('amazonBrandRegistry')" v-html="form.errors.get('amazonBrandRegistry')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.amazonSellerCentral" >
                        <label class="form-check-label" >Amazon Seller Central</label>
                        <div v-if="form.errors.has('amazonSellerCentral')" v-html="form.errors.get('amazonSellerCentral')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.ebay">
                        <label class="form-check-label" >Ebay</label>
                        <div v-if="form.errors.has('ebay')" v-html="form.errors.get('ebay')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.walmart">
                        <label class="form-check-label" >Walmart</label>
                        <div v-if="form.errors.has('walmart')" v-html="form.errors.get('walmart')" />
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-left py-2">
                <h4 class="pr-3 col-2 font-weight-bold pl-2">Social Media</h4>
                <div class="col-10">
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.instagram">
                        <label class="form-check-label" >Instagram</label>
                        <div v-if="form.errors.has('instagram')" v-html="form.errors.get('instagram')" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.pinterest" >
                        <label class="form-check-label" >Pinterest</label>
                        <div v-if="form.errors.has('pinterest')" v-html="form.errors.get('pinterest')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.rakuten">
                        <label class="form-check-label" >Rakuten</label>
                        <div v-if="form.errors.has('rakuten')" v-html="form.errors.get('rakuten')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.twitter">
                        <label class="form-check-label" >Twitter</label>
                        <div v-if="form.errors.has('twitter')" v-html="form.errors.get('twitter')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.youtube">
                        <label class="form-check-label" >YouTube</label>
                        <div v-if="form.errors.has('youtube')" v-html="form.errors.get('youtube')" />
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-left py-2 " style="background-color:rgba(143, 143, 160, 0.308);">
                <h4 class="pr-3 col-2 font-weight-bold text-dark pl-2">Special</h4>
                <div class="col-10">
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.filevista">
                        <label class="form-check-label" >Filevista</label>
                        <div v-if="form.errors.has('filevista')" v-html="form.errors.get('filevista')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.salesforce">
                        <label class="form-check-label" >Salesforce</label>
                        <div v-if="form.errors.has('salesforce')" v-html="form.errors.get('salesforce')" />
                    </div>
                    <div class="column form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" v-model="form.upwork" :disabled="formDisabled">
                        <label class="form-check-label" >Upwork</label>
                        <div v-if="form.errors.has('upwork')" v-html="form.errors.get('upwork')" />
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-center pt-2">
                <button type="submit" class="btn btn-primary ml-4 mb-4" :disabled="formDisabled">Submit</button>
                
            </div>
        </fieldset>
        </form>
    </div>
</template>

<script>
export default {
    //name: PlatformsForm,
    props: ['user', 'brand'],
    data(){
        return {
            isDisplayed: false,
            formDisabled: false,
            editMode: false,
            platforms:{},
            form: new Form({
              id: '',
              onePassword: '',
              email: '',
              slack: '',
              divy: '',
              paycom: '',
              quadpay: '',
              quickbooks: '',
              riskified: '',
              stripe: '',
              facebookBusinessManager: '',
              facebookPageAdmin: '',
              googleAnalytics: '',
              googleAds: '',
              googleAdSense: '',
              googleMerchantCenter: '',
              googleMyBusiness: '',
              googlePostmasterTools: '',
              googleSearchConsole: '',
              googleTagManager: '',
              bingSearchConsole: '',
              microsoftPostmasterTools: '',
              microsoftPowerbi: '',
              microsoftAdvertising: '',
              automizely: '',
              crazyegg: '',
              findify: '',
              hyros: '',
              kickbox: '',
              taboola: '',
              taggbox: '',
              tapcart: '',
              attentive: '',
              aircall: '',
              docusign: '',
              dropbox: '',
              gorgias: '',
              klaviyo: '',
              monday: '',
              revcascade: '',
              shiphero: '',
              shopify: '',
              todoist: '',
              tradefull: '',
              appleDeveloperConsole: '',
              database: '',
              github: '',
              googleDeveloperConsole: '',
              jira: '',
              octopus: '',
              server: '',
              sendgrid: '',
              twilio: '',
              amazonBrandRegistry: '',
              amazonSellerCentral: '',
              ebay: '',
              walmart: '',
              instagram: '',
              pinterest: '',
              rakuten: '',
              twitter: '',
              youtube: '',
              filevista: '',
              salesforce: '',
              upwork: ''

            })
        }
    },
    created(){
          console.log(this.brand);
          this.loadUsersPlatforms();
    },
    watch: {
        
    },
    computed:{
        
    },
    methods: {
        loadUsersPlatforms(){
            axios.get('/api/platform/'+ this.brand + '/' + this.user.id)
            .then((data)=>{
                this.form.id = data.data.id;
                this.form.onePassword = data.data.onePassword;
                this.form.email = data.data.email;
                this.form.slack = data.data.slack;
                this.form.divvy = data.data.divvy;
                this.form.paycom = data.data.paycom;
                this.form.quadpay = data.data.quadpay;
                this.form.quickbooks = data.data.quickbooks;
                this.form.riskified = data.data.riskified;
                this.form.stripe = data.data.stripe;
                this.form.facebookBusinessManager = data.data.facebookBusinessManager;
                this.form.facebookPageAdmin = data.data.facebookPageAdmin;
                this.form.googleAnalytics = data.data.googleAnalytics;
                this.form.googleAds = data.data.googleAds;
                this.form.googleAdSense = data.data.googleAdSense;
                this.form.googleMerchantCenter = data.data.googleMerchantCenter;
                this.form.googleMyBusiness = data.data.googleMyBusiness;
                this.form.googlePostmasterTools = data.data.googlePostmasterTools;
                this.form.googleSearchConsole = data.data.googleSearchConsole;
                this.form.googleTagManager = data.data.googleTagManager;
                this.form.bingSearchConsole = data.data.bingSearchConsole;
                this.form.microsoftPostmasterTools = data.data.microsoftPostmasterTools;
                this.form.microsoftPowerbi = data.data.microsoftPowerbi;
                this.form.microsoftAdvertising = data.data.microsoftAdvertising;
                this.form.automizely = data.data.automizely;
                this.form.crazyegg = data.data.crazyegg;
                this.form.findify = data.data.findify;
                this.form.hyros = data.data.hyros;
                this.form.kickbox = data.data.kickbox;
                this.form.taboola = data.data.taboola;
                this.form.taggbox = data.data.taggbox;
                this.form.tapcart = data.data.tapcart;
                this.form.attentive = data.data.attentive;
                this.form.aircall = data.data.aircall;
                this.form.docusign = data.data.docusign;
                this.form.dropbox = data.data.dropbox;
                this.form.gorgias = data.data.gorgias;
                this.form.klaviyo = data.data.klaviyo;
                this.form.monday = data.data.monday;
                this.form.revcascade = data.data.revcascade;
                this.form.shiphero = data.data.shiphero;
                this.form.shopify = data.data.shopify;
                this.form.todoist = data.data.todoist;
                this.form.tradefull = data.data.tradefull;
                this.form.appleDeveloperConsole = data.data.appleDeveloperConsole;
                this.form.database = data.data.database;
                this.form.github = data.data.github;
                this.form.googleDeveloperConsole = data.data.googleDeveloperConsole;
                this.form.jira = data.data.jira;
                this.form.octopus = data.data.octopus;
                this.form.server = data.data.server;
                this.form.sendgrid = data.data.sendgrid;
                this.form.twilio = data.data.twilio;
                this.form.amazonBrandRegistry = data.data.amazonBrandRegistry;
                this.form.amazonSellerCentral = data.data.amazonSellerCentral;
                this.form.ebay = data.data.ebay;
                this.form.walmart = data.data.walmart;
                this.form.instagram = data.data.instagram;
                this.form.pinterest = data.data.pinterest;
                this.form.rakuten = data.data.rakuten;
                this.form.twitter = data.data.twitter;
                this.form.youtube = data.data.youtube;
                this.form.filevista = data.data.filevista;
                this.form.salesforce = data.data.salesforce;
                this.form.upwork = data.data.upwork;
                if(isNaN(this.form.id) == false){
                    console.log("hello");
                    this.formDisabled = true;
                    this.isDisplayed = true;
                    
                }
              })
            
        },
        
        uploadUsersPlatforms(){
            if(this.editMode == false){
                this.$Progress.start();
                this.formDisabled = true;
                this.isDisplayed = true;
                this.form.post('/api/platform/'+ this.brand +'/' + this.user.id)
                .then(()=>{
                //Fire.$emit('afterUserCreated');
            
                toast.fire({
                icon: 'success',
                title: 'Platforms updated successfully'
                })

                this.$Progress.finish();
                //these are currently not updating without a browser reload
                // this.formDisabled == true;
                // this.isDisplayed == true;
                })
                
                .catch(()=> {
                this.$Progress.fail();
                });
            } else {
                this.$Progress.start();
                this.formDisabled = true;
                this.form.put('/api/platform/'+ this.brand +'/' + this.user.id)
                .then(()=>{
                console.log("put sent");
                toast.fire({
                icon: 'success',
                title: 'Platforms updated successfully'
                })

                

                })
                
                .catch(()=> {
                this.$Progress.fail();
                });
            }
        },
        editPlatforms(){
            this.formDisabled = false;
            this.editMode = true;
        }

    }
}
</script>

<style scoped>
    .form-check-input {
        background-color: blue;
        background: black;
    }
</style>