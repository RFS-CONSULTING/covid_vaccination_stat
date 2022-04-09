import Chart from 'chart.js/auto';
import axios from 'axios';

const ctx = document.getElementById('myChart');

axios.get('/provinces_layer').then(data => {
    let StoredData = data.data.province_layer_data;
    let provinces_data = JSON.parse(StoredData);
    let provinces = []
    let personnes_vacci = []
    provinces_data.features.forEach(province => {
        provinces.push(province.properties.nom)
        personnes_vacci.push(province.properties.pers_vacci)
    });

    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: provinces,
            datasets: [{
                label: 'Progression Personnes vaccinés',
                data: personnes_vacci,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
})