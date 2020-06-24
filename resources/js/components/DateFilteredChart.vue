<template>
    <div>
        <div class="filters" v-if="showFilter">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupResource">Seleziona risorsa:</label>
                </div>

                <select class="custom-select" id="inputGroupResource" v-model="resource">
                    <option value="user" selected>Users</option>
                    <option value="monument">Monuments</option>
                </select>
            </div>

            <div>
                <div class="d-flex mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">From Day</label>
                    </div>

                    <datepicker v-model="fromDay" minimum-view="day" maximun-view="year" format="yyyy-MM-dd" class="w-100" input-class="bg-white form-control" placeholder="From day"></datepicker>
                </div>

                <div class="d-flex mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">To day</label>
                    </div>

                    <datepicker v-model="toDay" minimum-view="day" maximun-view="year" format="yyyy-MM-dd" class="w-100" input-class="bg-white form-control" placeholder="To day"></datepicker>
                </div>
            </div>
        </div>
        
        <trend-chart
            id="last-week-users-joined"
            :datasets="datasets"
            :grid="grid"
            :labels="labels"
            :min="0"
            :key="val">
        </trend-chart>   
    </div> 
</template>

<script>
    import Datepicker from 'vuejs-datepicker'
    import axios from 'axios'

    export default {
        components: {
            Datepicker
        },
        data() {
            return {
                showFilter: true,
                resource: 'user',
                fromDay: null,
                toDay: new Date().getFullYear() + "-" + (new Date().getMonth() + 1) + "-" + new Date().getDate(),
                datasets: [
                    {
                        data: [],
                        smooth: false,
                        fill: true,
                        className: 'line',
                    },
                ],
                grid: {
                    verticalLines: true,
                    verticalLinesNumber: 1,
                    horizontalLines: true,
                    horizontalLinesNumber: 1
                },
                labels: {
                    xLabels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                    yLabels: 5
                },
                min: 0,
                val: 0
            }
        },
        methods: {
            getLastWeek() {
                var date = new Date();
                date.setDate(date.getDate() - 7);

                return date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate()
            },
            fetchData: function() {
                if (this.fromDay != null && this.toDay != null) {
                    axios.get('/api/v1/analitycs', {
                        params: {
                            resource: this.resource,
                            from: this.fromDay,
                            to: this.toDay
                        }
                    }).then((res) => {
                        this.labels.xLabels = res.data.labels
                        this.datasets[0].data = res.data.values
                        this.val++
                    })
                }
            }
        },
        mounted() {
            this.fromDay = this.getLastWeek()
            this.fetchData()
        },
        watch: {
            fromDay: function (val) {
                this.fetchData()
            },
            toDay: function (val) {
                this.fetchData()    
            },
            resource: function (val) {
                this.fetchData()
            },
        }
    }
</script>

<style lang="scss">
@import "../../sass/variables";

#last-week-users-joined {

    height: 400px;

    .line {
        .stroke {
          stroke: $primary;
          stroke-width: 2;
        }
    
        .fill {
          fill: $white;
        }
    }
}

</style>