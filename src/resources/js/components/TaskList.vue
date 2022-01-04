<template>
    <v-container fluid>
        <v-card tile :elevation="1" width="750" class="mx-auto p-2">
            <Datepicker
                v-model="defaultDate"
                name="datepicker"
                :format="datePickerFormat"
                :disabled-dates="disabledDates"
            ></Datepicker>

            <v-text-field
                :rules="rules"
                @keydown.enter.prevent="createTask"
                @click:append="createTask"
                v-model="newTask"
                label="Enter New Task"
                hide-details="auto"
                single-line
                append-icon="mdi-plus"
            ></v-text-field>

            <v-list dense two-line>
                <v-subheader>tasks</v-subheader>
                <v-list-item v-for="task in filterTasks" :key="task.id">
                    <v-list-item-content>
                        <v-list-item-title
                            v-text="task.text"
                            class="subtitle-1"
                        ></v-list-item-title>
                    </v-list-item-content>
                        <v-list-item-icon>
                            <v-btn icon>
                                <v-icon v-text="dotsIcon"></v-icon>
                            </v-btn>
                        </v-list-item-icon>
                </v-list-item>
            </v-list>
        </v-card>
    </v-container>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";

export default {
    components: {
        Datepicker,
    },

    props: {
        user_id: {
            type: String,
            required: true,
        },
    },

    data() {
        return {
            defaultDate: new Date(),
            datePickerFormat: "yyyy-MM-dd",
            disabledDates: {
                to: Date,
                from: Date,
            },
            dotsIcon: "mdi-dots-vertical",
            tasks: [],
            rules: [
                (value) => (value || "").length <= 50 || "Max 50 characters",
            ],
            newTask: "",
            errMessage: "",
        };
    },

    methods: {
        formatDate: function (date) {
            if (!!date) return moment(date).format("YYYY-MM-DD  H:mm");
        },
        getTasks() {
            axios.get("/api/user/" + this.user_id + "/tasks").then((res) => {
                this.tasks = res.data;
            });
        },
        createTask() {
            axios
                .post("/api/user/" + this.user_id + "/tasks", {
                    text: this.newTask,
                })
                .then((res) => {
                    this.getTasks();
                    this.newTask = "";
                })
                .catch((err) => {
                    this.errMessage = err;
                });
        },
    },

    computed: {
        filterTasks: function () {
            let date = moment(this.defaultDate).format("YYYY-MM-DD");
            return this.tasks.filter(function (task) {
                return moment(task.created_at).format("YYYY-MM-DD") === date;
            });
        },
    },

    created() {
        let dateto = new Date();
        let datefrom = new Date();
        dateto.setTime(dateto.getTime() - 24 * 60 * 60 * 30 * 1000);
        datefrom.setTime(datefrom.getTime() + 24 * 60 * 60 * 1000);
        this.disabledDates.to = dateto;
        this.disabledDates.from = datefrom;
    },

    mounted() {
        this.getTasks();
    },
};
</script>