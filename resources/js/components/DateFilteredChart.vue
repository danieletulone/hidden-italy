<template>
    <div>
        <div class="filters" v-if="showFilter">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupResource">Seleziona risorsa:</label>
                </div>

                <select class="custom-select" id="inputGroupResource" v-model="resource">
                    <option selected>Choose...</option>
                    <option value="years">Users</option>
                    <option value="months">Monuments</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupRange">Seleziona Range:</label>
                </div>

                <select class="custom-select" id="inputGroupRange" v-model="range">
                    <option selected>Choose...</option>
                    <option value="years">Years</option>
                    <option value="months">Month</option>
                    <option value="days">Days</option>
                </select>
            </div>

            <div v-if="range == 'years'">
                <div class="d-flex mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">From year</label>
                    </div>

                    <datepicker minimum-view="year" maximun-view="year" format="yyyy" class="w-100" input-class="bg-white form-control" placeholder="From year"></datepicker>
                </div>

                <div class="d-flex mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">To year</label>
                    </div>

                    <datepicker minimum-view="year" maximun-view="year" format="yyyy" class="w-100" input-class="bg-white form-control" placeholder="From year"></datepicker>
                </div>
            </div>

            <div v-if="range == 'months'">
                <div class="d-flex mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">From month</label>
                    </div>

                    <datepicker minimum-view="month" maximun-view="year" format="MM yyyy" class="w-100" input-class="bg-white form-control" placeholder="From month"></datepicker>
                </div>

                <div class="d-flex mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">To month</label>
                    </div>

                    <datepicker minimum-view="month" maximun-view="year" format="MM yyyy" class="w-100" input-class="bg-white form-control" placeholder="To month"></datepicker>
                </div>
            </div>

            <div v-if="range == 'days'">
                <div class="d-flex mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">From Day</label>
                    </div>

                    <datepicker minimum-view="day" maximun-view="year" format="dd MM yyyy" class="w-100" input-class="bg-white form-control" placeholder="From day"></datepicker>
                </div>

                <div class="d-flex mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">To day</label>
                    </div>

                    <datepicker minimum-view="day" maximun-view="year" format="dd MM yyyy" class="w-100" input-class="bg-white form-control" placeholder="To day"></datepicker>
                </div>
            </div>
        </div>
        
        <trend-chart
            id="last-week-users-joined"
            :datasets="datasets"
            :grid="grid"
            :labels="labels"
            :min="0">
        </trend-chart>   
    </div> 
</template>

<script>
    import Datepicker from 'vuejs-datepicker'

    export default {
        components: {
            Datepicker
        },
        data() {
            return {
                showFilter: true,
                toYear: null,
                fromYear: null,
                range: null,
                resource: null,
                datasets: [
                    {
                        data: [10, 50, 20, 100, 40, 60, 80],
                        smooth: true,
                        fill: true,
                        className: 'bla'
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
                min: 0
            }
        },
    }
</script>

<style lang="scss">
@import "../../sass/variables";

#last-week-users-joined {

    height: 400px;

    .bla {
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