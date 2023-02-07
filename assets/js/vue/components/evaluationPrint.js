const evaluationPrint = Vue.component('evaluationPrint', {
    template: `
        <div>
            <div class="row">
                <div class="col-xs-12">
                    <a href="" v-on:click.prevent="print"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
            
            <div id="invoiceContent">
                <div>
                    <div class="row"">
                        <div class="col-xs-12" style="text-align:center">
                            <div _h0986asdh>
                                <h2 style="margin:0px 0px 5px;">MM INTERNATIONAL</h2>
                               <h3 style="margin:0px;"><span style="border-bottom:1px solid;font-size:20px;" >Supplier Evaluation Record</span></h3>
                            </div>
                        </div>
                    </div>
                 <div class="row" style="margin:0px;">
                        <div class="col-xs-6">
                            <strong>Date of Evaluation : </strong> {{ inputData.date_of_evaluation }}<br>
                            <strong>Period of Evaluation : </strong> {{ inputData.period_of_evaluation }}<br>
                            <strong>Supplier Name : </strong> {{ inputData.Supplier_Name }}<br>
                            <strong>Address : </strong> {{ inputData.Supplier_Address }}<br>
                        </div>

                        <!--        <div class="col-xs-6" style="text-align:right">
                            <strong>DATE IN :</strong> {{ inputData.date_in }}<br>
                            <strong>DATE OUT :</strong> {{ inputData.date_out }}<br>
                            <strong>JOB STATUS :</strong> {{ inputData.job_status }}<br>
                        </div>    -->                     
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div _d9283dsc>
                                <table _a584de>
                                    <thead>
                                        <tr>
                                            <td rowspan="2">Sl.</td>
                                            <td rowspan="2">Material Name</td>
                                            <td colspan='5'>Rating</td>
                                        </tr>
                                        <tr>
                                            <td style="width:7%;">Quality (50)</td>
                                            <td style=" width:7%;">Service (30)</td>
                                            <td style="width:7%;">Price (20)</td>
                                            <td style=" width:7%;">Total (100)</td>
                                            <td style="width:20%;">Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(evaluation,index) in inputData.details">
                                            <td style="text-align:center;">{{ ++index }}</td>
                                            <td style="text-align:left;">{{ evaluation.material_name }}</td>
                                            <td style="text-align:center;">{{ evaluation.quality }}</td>
                                            <td style="text-align:center;">{{ evaluation.service }}</td>
                                            <td style="text-align:center;">{{ evaluation.price }}</td>
                                            <td style="text-align:center;">{{ evaluation.total }}</td>
                                            <td style="text-align:center;">{{ evaluation.remarks }}</td>
                                        </tr>
                                        <tr v-for="i in 10 - inputData.details.length">
                                            <td style="padding:12px;"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-xs-12">
                            <p>Evaluation Done by: </p>
                            <span><strong>Note: </strong></span><br>
                            <p>90-100 will be continued with satisfaction, 80-89 continue without satisfaction, 70-79 will be avoided</p>
                        </div>
                        <div class="col-xs-12" style="margin-top:50px;">
                            <div class="row">
                                <div class="col-xs-4">
                                    <p>Evaluation Done by: Purchase Manager</p>                            
                                </div>
                                <div class="col-xs-4">
                                    <p>Signature: </p>                            
                                </div>
                                <div class="col-xs-4">
                                    <p>Date: </p>                            
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>               
            </div>
        </div>
    `,
    props: ['id'],
    data(){
        return {
            inputData:{
                supplier_evaluation_id: '',
                date: moment().format('YYYY-MM-DD'),
                date_of_evaluation: '',
                period_of_evaluation: '',
                Supplier_Name: '',
                Supplier_Address: ''
            },
            cart: [],
            style: null,
            companyProfile: null,
            currentBranch: null
        }
    },
    filters: {
        formatDateTime(dt, format) {
            return dt == '' || dt == null ? '' : moment(dt).format(format);
        }
    },
    created(){
        this.setStyle();
        this.getEvaluationReport();        
        this.getCurrentBranch();
    },
    methods:{
        getEvaluationReport(){
            axios.post('/get-supplier-evaluation', {supplier_evaluation_id: this.id}).then(res=>{
                this.inputData = res.data[0];
            })
        },
        getCurrentBranch() {
            axios.get('/get_current_branch').then(res => {
                this.currentBranch = res.data;
            })
        },
        setStyle(){
            this.style = document.createElement('style');
            this.style.innerHTML = `
                div[_h098asdh],h4{
                    font-weight: bold;
                    font-size:20px;
                }
                div[_h0986asdh],h2{
                    font-weight: bold;
                    margin-bottom:30px;
                }
                div[_h098asdh],p{
                    font-size:12px;
                    font-weight:normal
                }
                div[_d9283dsc]{
                    padding-top:15px;
                    // border-bottom: 1px solid #ccc;
                    // margin-bottom: 5px;
                }
                table[_a584de]{
                    width: 100%;
                    text-align:center;
                    // margin-bottom: 10px;
                }                
                table[_a584de] thead{
                    font-weight:bold;
                }
                table[_a584de] td{
                    padding: 3px;
                    border: 1px solid;
                }

                table[_a584tde]{
                    width: 100%;
                    text-align:center;
                    margin-bottom: 10px;
                }
                table[_a584tde] thead{
                    font-weight:bold;
                }
                table[_a584tde] thead tr td{
                    padding: 3px;
                    border: 1px solid #ccc;
                }
                table[_a584tde] tbody tr td{
                    height: 40px;
                    border: 1px solid #ccc;
                }

                table[_t92sadbc2]{
                    width: 100%;
                }
                table[_t92sadbc2] td{
                    padding: 2px;
                }
            `;
            document.head.appendChild(this.style);
        },
        convertNumberToWords(amountToWord) {
            var words = new Array();
            words[0] = '';
            words[1] = 'One';
            words[2] = 'Two';
            words[3] = 'Three';
            words[4] = 'Four';
            words[5] = 'Five';
            words[6] = 'Six';
            words[7] = 'Seven';
            words[8] = 'Eight';
            words[9] = 'Nine';
            words[10] = 'Ten';
            words[11] = 'Eleven';
            words[12] = 'Twelve';
            words[13] = 'Thirteen';
            words[14] = 'Fourteen';
            words[15] = 'Fifteen';
            words[16] = 'Sixteen';
            words[17] = 'Seventeen';
            words[18] = 'Eighteen';
            words[19] = 'Nineteen';
            words[20] = 'Twenty';
            words[30] = 'Thirty';
            words[40] = 'Forty';
            words[50] = 'Fifty';
            words[60] = 'Sixty';
            words[70] = 'Seventy';
            words[80] = 'Eighty';
            words[90] = 'Ninety';
            amount = amountToWord == null ? '0.00' : amountToWord.toString();
            var atemp = amount.split(".");
            var number = atemp[0].split(",").join("");
            var n_length = number.length;
            var words_string = "";
            if (n_length <= 9) {
                var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
                var received_n_array = new Array();
                for (var i = 0; i < n_length; i++) {
                    received_n_array[i] = number.substr(i, 1);
                }
                for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
                    n_array[i] = received_n_array[j];
                }
                for (var i = 0, j = 1; i < 9; i++, j++) {
                    if (i == 0 || i == 2 || i == 4 || i == 7) {
                        if (n_array[i] == 1) {
                            n_array[j] = 10 + parseInt(n_array[j]);
                            n_array[i] = 0;
                        }
                    }
                }
                value = "";
                for (var i = 0; i < 9; i++) {
                    if (i == 0 || i == 2 || i == 4 || i == 7) {
                        value = n_array[i] * 10;
                    } else {
                        value = n_array[i];
                    }
                    if (value != 0) {
                        words_string += words[value] + " ";
                    }
                    if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                        words_string += "Crores ";
                    }
                    if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                        words_string += "Lakhs ";
                    }
                    if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                        words_string += "Thousand ";
                    }
                    if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                        words_string += "Hundred and ";
                    } else if (i == 6 && value != 0) {
                        words_string += "Hundred ";
                    }
                }
                words_string = words_string.split("  ").join(" ");
            }
            return words_string + ' only';
        },
        async print(){
            let invoiceContent = document.querySelector('#invoiceContent').innerHTML;
            let printWindow = window.open('', 'PRINT', `width=${screen.width}, height=${screen.height}, left=0, top=0`);
            if (this.currentBranch.print_type == '3') {
                printWindow.document.write(`
                    <html>
                        <head>
                            <title>Invoice</title>
                            <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
                            <style>
                                body, table{
                                    font-size:11px;
                                }
                            </style>
                        </head>
                        <body>
                            <div style="text-align:center;">
                                <img src="/uploads/company_profile_thum/${this.currentBranch.Company_Logo_org}" alt="Logo" style="height:80px;margin:0px;" /><br>
                                <strong style="font-size:18px;">${this.currentBranch.Company_Name}</strong><br>
                                <p style="white-space:pre-line;">${this.currentBranch.Repot_Heading}</p>
                            </div>
                            ${invoiceContent}
                        </body>
                    </html>
                `);
            } else if (this.currentBranch.print_type == '2') {
                printWindow.document.write(`
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Invoice</title>
                        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
                        <style>
                            html, body{
                                width:500px!important;
                            }
                            body, table{
                                font-size: 13px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="row">
                            <div class="col-xs-2"><img src="/uploads/company_profile_thum/${this.currentBranch.Company_Logo_org}" alt="Logo" style="height:80px;" /></div>
                            <div class="col-xs-10" style="padding-top:20px;">
                                <strong style="font-size:18px;">${this.currentBranch.Company_Name}</strong><br>
                                <p style="white-space:pre-line;">${this.currentBranch.Repot_Heading}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div style="border-bottom: 4px double #454545;margin-top:7px;margin-bottom:7px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                ${invoiceContent}
                            </div>
                        </div>
                    </body>
                    </html>
				`);
            } else {
				printWindow.document.write(`
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Invoice</title>
                        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
                        <style>
                            body, table{
                                font-size: 13px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <table style="width:100%;">
                                <thead>
                                    <tr>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <table style="width:100%">
                                                        <tr>
                                                            <td width:'33%'>Form No: MM10013</td>
                                                            <td style="text-align:center;width:33%">Version: 00</td>
                                                            <td style="text-align:right;width:33%">Rivision date: 19.01.2020</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-xs-12">
                                                    ${invoiceContent}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                            <div style="width:100%;height:100px;">&nbsp;</div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="row" style="margin-bottom:5px;padding-bottom:6px;">
                                <div class="col-xs-6">
                                    <span style="text-decoration:overline;">PREPARED BY: MR</span>
                                    
                                </div>
                                <div class="col-xs-6 text-right">
                                    <span style="text-decoration:overline;">APPROVED BY: PROPRIETOR</span>
                                </div>
                            </div>
                        <!--    <div style="position:fixed;left:0;bottom:15px;width:100%;">
                                <div class="row" style="font-size:12px;">
                                    <div class="col-xs-6">
                                        Print Date: ${moment().format('DD-MM-YYYY h:mm a')}, Printed by: ${this.inputData.User_Name}
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        Developed by: Link-Up Technologoy, Contact no: 01911978897
                                    </div>
                                </div>
                            </div>  -->
                        </div>
                        
                    </body>
                    </html>
				`);
            }
            let invoiceStyle = printWindow.document.createElement('style');
            invoiceStyle.innerHTML = this.style.innerHTML;
            printWindow.document.head.appendChild(invoiceStyle);
            printWindow.moveTo(0, 0);
            
            printWindow.focus();
            await new Promise(resolve => setTimeout(resolve, 1000));
            printWindow.print();
            printWindow.close();
        }
    }
})