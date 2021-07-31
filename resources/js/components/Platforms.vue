<template>
    <div class="platforms">
        <nav class="nav nav-pills nav-fill nav-tabs"  role="tablist">
            <router-link to="/platforms/dressbarn" class="nav-item nav-link active" role="tab" data-toggle="tab" aria-controls="dressbarn" aria-select="true">Dressbarn</router-link>
            <router-link to="/platforms/pier1" class="nav-item nav-link" role="tab" data-toggle="tab" aria-controls="pier1" aria-select="true">Pier 1</router-link>
            <router-link to="/platforms/steinmart" class="nav-item nav-link" role="tab" data-toggle="tab" aria-controls="steinmart" aria-select="true">SteinMart</router-link>
            <router-link to="/platforms/radioshack" class="nav-item nav-link" role="tab" data-toggle="tab" aria-controls="radioshack" aria-select="true">RadioShack</router-link>
            <router-link to="/platforms/modells" class="nav-item nav-link" role="tab" data-toggle="tab" aria-controls="modells" aria-select="true">Modell's</router-link>
            <router-link to="/platforms/linensnthings" class="nav-item nav-link" role="tab" data-toggle="tab" aria-controls="linensnthings" aria-select="true">Linens N Things</router-link>
            <router-link to="/platforms/farmerscart" class="nav-item nav-link" role="tab" data-toggle="tab" aria-controls="farmerscart" aria-select="true">Farmers Cart</router-link>
            <router-link to="/platforms/franklinmint" class="nav-item nav-link" role="tab" data-toggle="tab" aria-controls="franklinmint" aria-select="true">Franklin Mint</router-link>
            
        </nav>
            
        <router-view :user=user ></router-view>
           
        
  </div>
</template>

<script>
export default {
    props: ['user'],
    name: 'Platforms',
    
}
</script>

<style scoped>
    
</style>