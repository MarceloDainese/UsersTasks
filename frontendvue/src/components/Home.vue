<template>
    <div>
        <p v-if="userLogin.name">Bem vindo : {{ userLogin.name }}</p>

    </div>
</template>

<script>
export default {
    name: 'Home',
    props: ['userLogin'],

}
</script>

<style lang="sass" scoped>

</style>
