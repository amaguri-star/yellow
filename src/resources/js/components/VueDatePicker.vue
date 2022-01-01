<template>
    <Datepicker
        v-model="defaultDate"
        name="datepicker"
        :format="datePickerFormat"
        :disabled-dates="disabledDates"
    ></Datepicker>
</template>

<script>
import Datepicker from "vuejs-datepicker";

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
        };
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

