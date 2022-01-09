<template>
    <v-container fluid>
        <!-- {{ user.id }} -->
        <v-card tile :elevation="1" width="750" class="mx-auto p-2">
            <Datepicker
                v-model="defaultDate"
                name="datepicker"
                :format="datePickerFormat"
                :disabled-dates="disabledDates"
            ></Datepicker>

            <v-text-field
                :rules="rules"
                @keypress.enter.prevent="createTask"
                @click:append="createTask"
                v-model="newTaskText"
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
                        <v-btn icon @click="openEditModal(task.id, task.text)">
                            <v-icon>mdi-pencil-outline</v-icon>
                        </v-btn>
                    </v-list-item-icon>
                    <v-list-item-icon>
                        <v-btn icon @click.prevent="deleteTask(task.id)">
                            <v-icon>mdi-trash-can-outline</v-icon>
                        </v-btn>
                    </v-list-item-icon>
                </v-list-item>
            </v-list>
        </v-card>
        <EditModal @close="closeEditModal" v-if="modal">
            <template slot="content">
                <div v-text="editTaskId"></div>
                <v-text-field
                    :rules="rules"
                    v-model="editTaskText"
                ></v-text-field>
            </template>
            <template slot="footer">
                <button @click="closeEditModal">Close</button>
                <button @click="editTask">Send</button>
            </template>
            <!-- /footer -->
        </EditModal>
    </v-container>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";
import EditModal from "./EditModal.vue";
import { mapState } from "vuex";

export default {
    components: {
        Datepicker,
        EditModal,
    },
    props: {
        userId: {
            type: Number,
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
            newTaskText: "",
            editTaskId: Number,
            editTaskText: "",
            errMessage: "",
            modal: false,
        };
    },

    methods: {
        formatDate: function (date) {
            if (!!date) return moment(date).format("YYYY-MM-DD  H:mm");
        },
        openEditModal(id, text) {
            this.editTaskId = id;
            this.editTaskText = text;
            this.modal = true;
        },
        closeEditModal() {
            this.editTaskId = null;
            this.editTaskText = "";
            this.modal = false;
        },
        getTasks() {
            axios.get("/api/user/" + this.userId + "/tasks").then((res) => {
                this.tasks = res.data;
            });
        },
        createTask() {
            axios
                .post("/api/user/" + this.userId + "/tasks", {
                    text: this.newTaskText,
                })
                .then((res) => {
                    this.getTasks();
                    this.newTaskText = "";
                })
                .catch((err) => {
                    this.errMessage = err;
                });
        },
        editTask() {
            axios
                .put(
                    "/api/user/" + this.userId + "/tasks/" + this.editTaskId,
                    {
                        text: this.editTaskText,
                    }
                )
                .then((res) => {
                    this.closeEditModal();
                    this.getTasks();
                })
                .catch((err) => {
                    this.errMessage = err;
                });
        },
        deleteTask(taskId) {
            axios
                .delete("/api/user/" + this.userId + "/tasks/" + taskId)
                .then((res) => {
                    this.getTasks();
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
        ...mapState("util", ["user", "isLoggedIn"]),
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