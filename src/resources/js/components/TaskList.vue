<template>
    <section class="w-full px-20 py-8">
        <Datepicker
            v-model="defaultDate"
            name="datepicker"
            :format="datePickerFormat"
            :disabled-dates="disabledDates"
        ></Datepicker>
        <ul class="flex flex-col space-y-4 h-full overflow-y-scroll">
            <li
                v-for="task in filterTasks"
                :key="task.id"
                class="w-full px-5 py-3 shadow hover:shadow-md rounded"
            >
                <div class="flex">
                    <div class="font-medium text-lg text-gray-700">
                        {{ task.name }}
                    </div>
                    <div class="flex items-center justify-end space-x-2">
                        <div class="text-gray-400 text-sm">
                            {{ formatDate(task.created_at) }}
                        </div>
                        <div class="group dropdown inline-block relative">
                            <button
                                class="
                                    rounded-full
                                    hover:bg-gray-200
                                    text-gray-400
                                    transition
                                    ease-in-out
                                    duration-200
                                "
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                                    />
                                </svg>
                            </button>
                            <ul
                                class="
                                    dropdown-menu
                                    absolute
                                    hidden
                                    right-0
                                    bg-white
                                    p-2
                                    rounded
                                    shadow-lg
                                    group-hover:block
                                    divide-y divide-solid
                                "
                            >
                                <li class="text-lg edit_task_modal">
                                    <a href="">edit</a>
                                </li>
                                <li class="text-lg text-red-400">
                                    <a href="">delete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <p>{{ task.description }}</p>
            </li>
        </ul>
    </section>
</template>
<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";

export default {
    props: {
        tasks: Array,
    },
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
};
</script>