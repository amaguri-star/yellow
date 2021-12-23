<template>
    <v-navigation-drawer app permanent left>
        <template v-slot:prepend>
            <v-list-item two-line>
                <v-list-item-avatar>
                    <img src="https://randomuser.me/api/portraits/men/16.jpg" />
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title v-text="userName"></v-list-item-title>
                    <v-list-item-subtitle>rank: 7</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
        </template>

        <v-divider></v-divider>

        <v-list dense>
            <v-list-item
                v-for="item in items"
                :key="item.title"
                :href="item.link"
            >
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
        userName: String,
    },
    data() {
        return {
            items: [
                { title: "Home", icon: "mdi-home-city", link: "/" },
                { title: "Task", icon: "mdi-account", link: "/tasks" },
                { title: "Chat", icon: "mdi-account-group-outline", link: "#" },
            ],
        };
    },
};
</script>
