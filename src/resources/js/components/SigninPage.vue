<template>
    <v-container>
        <v-card width="450px" class="mx-auto mt-5">
            <v-card-title>
                <h1 class="display-1">ユーザ登録</h1>
            </v-card-title>
            <v-card-text>
                <v-form>
                    <v-text-field
                        prepend-icon="mdi-account-circle"
                        label="username"
                        type="text"
                        v-model="username"
                    ></v-text-field>
                    <v-text-field
                        prepend-icon="mdi-email"
                        label="email"
                        type="email"
                        v-model="email"
                    ></v-text-field>
                    <v-text-field
                        v-bind:type="showPassword ? 'text' : 'password'"
                        @click:append="showPassword = !showPassword"
                        prepend-icon="mdi-lock"
                        v-bind:append-icon="
                            showPassword ? 'mdi-eye' : 'mdi-eye-off'
                        "
                        label="password"
                        v-model="password"
                    ></v-text-field>
                    <v-text-field
                        v-bind:type="showPassword ? 'text' : 'password'"
                        @click:append="showPassword = !showPassword"
                        prepend-icon="mdi-lock"
                        v-bind:append-icon="
                            showPassword ? 'mdi-eye' : 'mdi-eye-off'
                        "
                        label="password_confirmation"
                        v-model="passwordConfirmation"
                    ></v-text-field>
                    <v-card-actions>
                        <v-btn class="info" @click="signin">登録</v-btn>
                    </v-card-actions>
                    <v-card-actions>
                        <v-btn text :to="{ name: 'login' }">ログインの方</v-btn>
                    </v-card-actions>
                </v-form>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            showPassword: false,
            username: "",
            email: "",
            password: "",
            passwordConfirmation: "",
        };
    },

    methods: {
        signin() {
            //
        }
    }
};
</script>

<style>
</style>


