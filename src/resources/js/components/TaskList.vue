<template>
    <v-container fluid>
        <v-card tile :elevation="1" width="750" class="mx-auto p-2">
            <Datepicker
                v-model="defaultDate"
                name="datepicker"
                :format="datePickerFormat"
                :disabled-dates="disabledDates"
            ></Datepicker>
            <v-list dense>
                <v-subheader>tasks</v-subheader>
                <v-list-item-group v-model="selectedItem" color="primary">
                    <v-list-item v-for="item in filterTasks" :key="item.id">
                        <v-list-item-content>
                            <v-list-item-title
                                v-text="item.text"
                                class="subtitle-1"
                            ></v-list-item-title>
                            <v-list-item-subtitle v-text="item.description">
                            </v-list-item-subtitle>
                        </v-list-item-content>
                        <v-list-item-icon>
                            <v-btn icon>
                                <v-icon v-text="dotsIcon"></v-icon>
                            </v-btn>
                        </v-list-item-icon>
                    </v-list-item>
                </v-list-item-group>
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
    data() {
        return {
            defaultDate: new Date(),
            datePickerFormat: "yyyy-MM-dd",
            disabledDates: {
                to: Date,
                from: Date,
            },
            dotsIcon: "mdi-dots-vertical",
            selectedItem: 1,
            tempDate: [
                {
                    id: 0,
                    text: "task01",
                    description: "test1 des",
                    created_at: "2022-01-01",
                },
                {
                    id: 1,
                    text: "task02",
                    description: "test2 des",
                    created_at: "2022-01-01",
                },
                {
                    id: 2,
                    text: "task03",
                    description: "test3 des",
                    created_at: "2022-01-01",
                },
                {
                    id: 3,
                    text: "task04",
                    description: "test4 des",
                    created_at: "2022-01-01",
                },
            ],
        };
    },

    methods: {
        formatDate: function (date) {
            if (!!date) return moment(date).format("YYYY-MM-DD  H:mm");
        },
    },
    computed: {
        filterTasks: function () {
            let date = moment(this.defaultDate).format("YYYY-MM-DD");
            return this.tempDate.filter(function (task) {
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
};
</script>