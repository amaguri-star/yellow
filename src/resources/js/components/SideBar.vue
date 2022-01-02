<template>
    <v-navigation-drawer app permanent left>
        <template v-slot:prepend>
            <v-list-item two-line>
                <v-list-item-avatar>
                    <img src="https://randomuser.me/api/portraits/men/81.jpg" />
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title>{{ username }}</v-list-item-title>
                    <v-list-item-subtitle>Logged In</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
        </template>

        <v-divider></v-divider>

        <v-list dense>
            <v-list-item v-for="item in items" :key="item.title" :to="item.to">
                <v-list-item-icon>
                    <v-icon>{{ item.icon }}</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>{{ item.title }}</v-list-item-title>
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
            required: true,
        },
    },

    data() {
        return {
            items: [
                { title: "Home", icon: "mdi-home-city-outline", to: "/" },
                {
                    title: "My Account",
                    icon: "mdi-account-outline",
                    to: "/user",
                },
                {
                    title: "Tasks",
                    icon: "mdi-calendar-check-outline",
                    to: "/tasks",
                },
                { title: "Chat", icon: "mdi-chat-outline", to: "/chat" },
                { title: "Settings", icon: "mdi-cog-outline", to: "/settings" },
            ],
        };
    },
};
</script>