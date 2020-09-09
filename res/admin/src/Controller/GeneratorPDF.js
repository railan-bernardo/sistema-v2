class GeneratorPDF{
    constructor(formId){
        this.formEl = document.getElementById(formId);
        this.onSubmit();
        this.responsavel();
    }


    onSubmit(){

        this.formEl.addEventListener('submit', e=>{

            e.preventDefault();
            let values = this.getValues();
            
            if(!values) return false
           this.html(values);
           

        });

    }

    getValues(){

        let contrato = {};
        let isValue = true;

        [...this.formEl.elements].forEach((el, index) =>{

            if(['nome','email','cpf','rg'].indexOf(el.name) > -1 && !el.value){
                el.parentElement.classList.add('has-error');
                isValue = false;
                
                }else if(el.name === 'cpf'){

                let ip = document.querySelector('.cpf')
    
                if(ip.value.length < 14){
                    el.parentElement.classList.add('has-error');
                    isValue = false
                    this.create()
                }else{
                    contrato[el.name] = el.value;
                }
                
            }else{

                if(el.name == 'curso'){

                    if(el.checked){
                        contrato[el.name] = el.value;
                    }
                }else if(el.name == 'periodo'){
                    if(el.checked){
                        contrato[el.name] = el.value;
                    }
                }else{
                    contrato[el.name] = el.value;
                }
               
            }
            

        });

        if(!isValue){
            return false;
        }
        return new PDF(
            contrato.nome,
            contrato.responsavel,
            contrato.email,
            contrato.cpf,
            contrato.rg,
            contrato.birth,
            contrato.telefone,
            contrato.celular,
            contrato.city,
            contrato.estado,
            contrato.bairro,
            contrato.endereco,
            contrato.cep,
            contrato.turma,
            contrato.consultora,
            contrato.ass,
            contrato.datec,
            contrato.periodo,
            contrato.curso
        );
       // inn ints no not inte inten matu ves
    }
    
        create(){

        let span = document.createElement('span')

        span.innerHTML = "CPF Inválido"

        span.style.color = "#ff0000"
        span.style.paddingTop = "5px"
        

        document.querySelector('.msg').appendChild(span)
    }


    html(data){

        
       let pdf = window.open('','','width=800, height=760')

        let html = `
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato - CACURSOS</title>
    <style>
        body{
            width: 100%;
            background: #ffffff;
            box-sizing: border-box;
            font-family: sans-serif;
            margin:0;
            padding: 0;
        }

        .container{
            width: 100%;
        }

        .row{
            width: 100%;
            display: block;
        }
        header{
            width: 100%;
            margin: 0;
            padding:0;
        }

        header h1{
            font-size: 1.3em;
            font-weight: bold;
            color: #000000;
            padding: 20px 0;
            text-align: center;
            border: 1px solid #000000;
        }

        .col{
            width:  100%;          
            padding: 15px 0 !important;
        }

        .col h2{
            font-size: .9em !important;
            font-weight: normal;
            padding: 0;
            margin: 0;
        }

        .col p{
            font-size: 1em;
        }

        .title{
            font-size: 1.2em !important;
            font-weight: bold !important;
            color: #000000;
            padding-bottom: 15px !important;
        }

        .col-span{
            width:  100%;
            padding: 15px 0;
        }

        .col-span span{
            padding: 0;
            margin: 0;
            font-size: .9em !important;
            line-height: 2;
        }

        .col-span span h4{
            font-weight: 600 !important;
            color: #5e5e5e;
            font-size: .9em !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .col ul{
            width: 100%;
            display: block;
            list-style: none;
            padding: 0 !important;
            margin: 0 !important;
        }

        .col ol{
            width: 100%;
            display: block;
            padding: 0;
            margin: 0;
        }

        .col ul li{
            margin: 15px 0;
            font-size: .9em !important;
        }

        .col ol li{
            margin: 15px;
            font-size: .9em !important;
            text-align: justify;
        }

        .sub-title{
            font-size: .9em !important;
            margin: 0;
            padding: 0;
        }

h4{
    display: inline-block;
    margin: 0;
    padding: 0;
    font-size: .9em !important;
}

.col h3{
    font-size: .9em !important;
}


    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <header>
                <h1>TERMO DE CONTRATAÇÃO E MATRÍCULA CURSOS PROFISSIONALIZANTES</h1>
            </header>
            <div class="col">
                <h2 class="sub-title">CONTRATADA: CA Cursos sediada na Rua 02, N° 115 - Centro, na cidade de Goiânia</h2>
                <p style="padding: 0; margin:0;">inscrita no CPNJ N° <strong>09.068.723/0001-05.</strong> </p>
            </div>
            <form>
            <div class="col">
                <span class='not'>Aluno:<p style="display: inline-block; margin: 0 0 8px 8px !important;">${data.nome}</p></span><br>
                <span class='respon'>Responsavel pelo Aluno:<p style="display: inline-block; margin: 0 0 8px 8px !important;">${(data.responsavel !== '') ? data.responsavel : 'Eu Mesmo (a)'}</p></span>

            </div>
            <div class="col-span">
                <h2 class="title">Contratante responsável legal e financeiro:</h2>
                <span>Nome:&nbsp;<h4>${(data.responsavel == '') ? data.nome : data.responsavel}</h4></span><br>
                <span>E-mail:&nbsp;<h4>${data.email}</h4> </span><br>
                <span>CPF:&nbsp;<h4>${data.cpf}</h4></span>&nbsp;<span>RG:&nbsp;<h4>${data.rg}</h4>&nbsp;</span><span>&nbsp;Data de Nacimento:&nbsp;<h4>${data.birth}</h4> </span><br>
                <span>Telefone:&nbsp;<h4>${(data.telefone !== '') ? data.telefone : "Não Possui"}</h4>&nbsp;</span><span>&nbsp;Celular:&nbsp;<h4>${data.celular}</h4> </span><br>
                <span>Cidade:&nbsp;<h4>${data.city}</h4></span>&nbsp;<span>&nbsp;Estado:&nbsp;<h4>${data.estado}</h4> </span><br>
                <span>Endereço:&nbsp;<h4>${data.endereco}</h4></span>&nbsp;&nbsp;<span>&nbsp;Bairro:<h4>${data.bairro}</h4></span>&nbsp;&nbsp;<span>&nbsp;CEP:<h4>${data.cep}</h4></span><br>
                <span>Inicio da Turma:&nbsp;<h4>${data.turma}</h4>&nbsp;</span><span>&nbsp;Consultora:&nbsp;<h4>${data.consultora}</h4></span><br>
            </div>
            <div class="col">
                <h2 class="title">Curso Contratado:</h2>
                <ul>
                    <li>
                        ${data.curso}
                    </li>


                </ul>
            </div>
            <div class="col">
                <h2 class="title">Período/Contratado:</h2>
                <ul>
                    <li>
                        ${data.periodo}
                    </li>
                    
                     <h2 class="title">NO CASO DE RESCISÃO DO PRESENTE CONTRATADO, PELO CONTRATANTE A EMPRESA NÃO RESTITUIRÁ O VALOR PAGO.</h2>
                </ul>
            </div>
            <div class="col">
                <h2 class="title">CONTRATO DE PRESTAÇÃO DE SERVIÇOS DE TREINAMENTO</h2>
                <ol>
                   <li>
                    Como contra-prestação aos serviços educacionais prestados pela contratada, o contratante pagará à contratada os valores totais correspondente ao curso contratado.
                   </li><!-- li -->

                   <li>
                    Os valores devidos pelo contratante serão pagos da seguinte forma:
                   Valor total de forma parcelada apenas por cartão de crédito aceitos pela empresa ou á vista de forma única em dinheiro, sendo pago no 1º (primeiro) dia de aula o valor total do curso.
                </li><!-- li -->
                    <h2 class="title">NO CASO DE RESCISÃO DO PRESENTE CONTRATADO, PELO CONTRATANTE A EMPRESA NÃO RESTITUIRÁ O VALOR PAGO.</h2>
                <li>
                    Desistência ou Cancelamento - O ALUNO reconhece que ao efetuar a garantia de vaga do treinamento, motivou uma serie de custos para a CA Cursos, tais como elaboração de apostilas, reserva de sala de aula, contratação de instrutores, e muitos outros custos. Decorrentes, bem como a impossibilidade de suprir a vaga com novo aluno. Desta forma a desistência ou cancelamento fará o ALUNO ficar sujeito ao pagamento uma multa no valor de <strong> R$ 300,00 (trezentos reais).</strong>   
                </li><!-- li -->

                <li>
                    Caso a CA Cursos não for notificada em prazo de 72 horas uteis de antecedência, 3 dias uteis antes do início do treinamento em questão. A notificação deve ser feita por escrito, assinada e entregue pessoalmente, por e-mail ou FAX ao consultor comercial responsável pela sua inscrição na CA Cursos. O aluno só poderá substituir seu treinamento por outro da CA Cursos, caso faça a requisição até 96 horas uteis, antes de iniciar o treinamento no qual estava inscrito inicialmente.
                </li><!-- li -->

                <li>
                    O presente contrato e termo de contratação têm vigência para o curso contratado e prazo de pagamento contratado. 
                </li><!-- li -->

                <li>
                    Reposição de aulas: A aula só será reposta se caso o contratante apresentar atestado médico próprio ou atestado de óbito de parentes de primeiro grau.  
                </li><!-- li -->

                <li>
                    As aulas começam no horário de Brasília e só será permitido uma tolerância de 20 minutos a partir do horário de início das aulas.   
                </li><!-- li -->

                <li>
                    O curso é de caráter individual e insubstituível não podendo ser transferido a nenhuma pessoa apenas ao contratante que assina o contrato.    
                </li><!-- li -->

                <li>
                    O curso é valido apenas para o período contratado não podendo ser aplicado e outra data, ou seja, não pode ser adiado definido a data de início. 
                </li><!-- li -->

                <li>
                    As partes elegem o foro da Comarca de Goiânia-GO. “Onde os serviços de treinamentos serão prestados”, para qualquer demanda judicial relativa a presente contrato, com exclusão de qualquer outro, bem como, com expressa renúncia de qualquer outro. 
                </li><!-- li -->

                <li>
                    Autorização pelo o direito de uso de imagem/fotografia do curso, sem quaisquer ônus presentes ou futuros para as partes. 
                </li><!-- li -->
                </ol>
            </div>
            <div class="col">
                <h2 class="title">O Aluno/Contratante declara neste ato:</h2>
                <ol>
                    <li>Conhecer, concordar e aderir a todas as condições gerais do contrato.</li>
                    <li>Declaro ter recebido cópia do contrato neste ato.</li>
                </ol>
            </div>
            <div class="col">
                <li style="list-style: none; border-bottom: 1px solid #000000;">X&nbsp; ${data.ass}</li>
            </div>
            <div class="col">
                <h3 style="text-align: center;">Assinatura do contratante, responsável legal e financeiro</h3>
               <div style="width: 50%; margin: 0 auto;"> <p style="display: inline-block;text-align: center;">Goiânia,&nbsp;&nbsp;<li style="list-style: none; border-bottom: 1px solid #000000; display: inline-block; text-align: center;">${data.datec}</li></p></div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>
        `;
pdf.document.write(html);
pdf.print();
        return html;

    }

    responsavel(){
        document.querySelector('.bt').addEventListener('click', e =>{

            document.querySelector('.resp').style.display = "block";
            

        })
    }
}