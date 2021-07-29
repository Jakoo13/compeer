<template>
    <div class="container">
        <div class="row">
            
            <h1 class="text-center col-11">Steinmart</h1>
            
        </div>
        <h3 class="text-center pt-3 mb-3 ">Please Select All Platforms You Have Access Too</h3>
        <platform-form :user="user" brand="steinmart"></platform-form>
    </div>
</template>

<script>
import PlatformsForm from '../PlatformsForm.vue';

export default {
    props: ['user'],
    components: {
        "platform-form": PlatformsForm
    }
}
</script>

<style>

</style>