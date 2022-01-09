<template>
    <v-navigation-drawer app permanent left>
        <template v-slot:prepend>
            <v-list-item two-line>
                <v-list-item-avatar>
                    <img src="https://randomuser.me/api/portraits/men/81.jpg" />
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title>{{ username }}</v-list-item-title>
                    <v-list-item-subtitle>Rank: 7</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
        </template>

        <v-divider></v-divider>

        <v-list v-if="isLoggedIn" dense>
            <v-list-item>
                <v-list-item-icon>
                    <v-icon>mdi-home-city-outline</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Home</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item>
                <v-list-item-icon>
                    <v-icon>mdi-account-outline</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>My Account</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item :to="{ name: 'task.list' }">
                <v-list-item-icon>
                    <v-icon>mdi-calendar-check-outline</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Tasks</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item>
                <v-list-item-icon>
                    <v-icon>mdi-chat-outline</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Chat</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item>
                <v-list-item-icon>
                    <v-icon>mdi-cog-outline</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Settings</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item @click="logout">
                <v-list-item-icon>
                    <v-icon>mdi-logout</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Logout</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>

        <v-list v-else>
            <v-list-item :to="{ name: 'signin' }">
                <v-list-item-icon>
                    <v-icon>mdi-account-plus-outline</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Signin</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item :to="{ name: 'login' }">
                <v-list-item-icon>
                    <v-icon>mdi-login</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Login</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
export default {
    props: {
        username: {
            type: String,
        },
        isLoggedIn: {
            type: Boolean,
        },
    },

    methods: {
        logout() {
            axios
                .post("/logout")
                .then((res) => {
                    console.log("logout");
                    this.$router.push({ name: "login" });
                })
                .catch((err) => {
                    console.log("err");
                });
        },
    },
};
</script>