<template>
    <div class="navbar-item">
                    <ais-index app-id="SY4SQ68G9C" api-key="40e71da3d14a7acfe056363f38d63836" index-name="posts">
                        <ais-search-box placeholder="Procurar posts"></ais-search-box>
                        <ais-results>
                            <template slot-scope="{ result }">
                                <h2>
                                    <ais-highlight :result="result" attribute-name="titulo"></ais-highlight>
                                </h2>
                            </template>
                        </ais-results>
                        <ais-no-results>
                            <template slot-scope="{ result}">
                                Nenhum post achado.
                            </template>
                        </ais-no-results>
                    </ais-index>
                </div>
</template>

<script>
    export default {

        mounted() {
            console.log('Component pesquisa montado.')
        }
    }
</script>