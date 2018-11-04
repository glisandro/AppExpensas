var base = require('settings/settings');

Vue.component('storefirstgasto', {
    mixins: [base],
    data() {
        return {
            form: new SparkForm({
                periodo: 's',
                total_expensa_a: '',
                total_expensa_b: '',
                total_expensa_c: '',
                total_expensa_ext_a: '',
                total_expensa_ext_b: '',
                total_expensa_ext_c: '',
                rubro: '',
                concepto: '',
                importe_a: '',
                importe_b: '',
                importe_c: '',
                extraordinario: ''
            })
        };
    },
    created() {
        console.log(Spark.currentConsorcio);
    },
    mounted() {
        console.log('mounted');
    },
    methods: {
        register() {
            Spark.post('/consorcios/' + Spark.currentConsorcio + '/presupuestos/storefirtgasto', this.form)
                .then(response => {
                console.log(response);
            });
        }
    }
});
