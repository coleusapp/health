<script lang="ts" setup>
import { Chart, LineController, LineElement, PointElement, LinearScale, Title, CategoryScale, Tooltip, Legend } from 'chart.js';
import { onMounted, ref } from 'vue';

const canvas = ref('canvas');
Chart.register(LineController, LineElement, PointElement, LinearScale, Title, CategoryScale, Tooltip, Legend);

const props = defineProps<{
    data: any;
}>();
onMounted(() => {
    new Chart(canvas.value, {
        type: 'line',
        data: props.data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                },
            },
        },
    });
});
</script>
<template>
    <div class="relative">
        <canvas ref="canvas"></canvas>
    </div>
</template>