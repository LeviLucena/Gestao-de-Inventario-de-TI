<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart" width="400" height="200"></canvas>

<script>
    // Suponha que você tenha uma variável "data" contendo os dados do banco de dados
    // A estrutura seria algo como: {tipo: "CPU", quantidade: 10}, {tipo: "Mouse", quantidade: 5}, etc.

    // Extrai os tipos e quantidades do objeto "data" para criar o gráfico
    const tipos = data.map(item => item.tipo);
    const quantidades = data.map(item => item.quantidade);

    // Cria o gráfico
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: tipos,
            datasets: [{
                label: 'Quantidade',
                data: quantidades,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
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
</script>

