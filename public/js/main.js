const employers= document.getElementById('sailorTable');
 if(employers){
     employers.addEventListener('click', e => {
         if(e, target.classNamen === 'btn btn-danger delete-employers'){
            if(confirm("Etes-vous vraiement sure de vouloir supprimer l'employer?")){
                const id= e.target.getAttribute('data-id');
                fetch('/employers/delete/${id}',{
                method: 'DELETE'
                }).then(res => window.location.reload());
            }
         }
     });
     
 }