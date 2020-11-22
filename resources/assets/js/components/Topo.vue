<template>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12 col-md-8"><img v-bind:src="url"></div>
        </div>
    </div>
</template>
<script>
export default {
    props:[url]
}
</script>
