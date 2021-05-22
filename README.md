# API com Lumen PHP Framework
- Crie uma base de dados com o nome de (projeto_lumen)
- Execute os seguintes comandos: php artisan migrate - php artisan db:seed
- para gerar o seu token de api basta fazer uma requisição get na seguinte rota: /api/authenticate?email=teste@teste.com.br&password=123456
- Na pasta public/util você encontra um arquivo do progrma (Insominia) com todas as requisições utilizadas para testar é só importar.
  
# ROUTE personalCollection
- allCollection (listar toda a coleção) (GET) /api/personalCollection/allCollection?paginate=10&page=1&sort=type
- types  (possiveis tipos para a colção) (GET)  /api/personalCollection/types 
- find  (ver item especifico) (GET)  /api/personalCollection/find?personal_collection_id=1 
- update (atualizar item) (POST) /api/personalCollection/update
- create (criar um item) (POST) /api/personalCollection/create

# ROUTE contacts
- allContacts (listar todos contatos) (GET) /api/contacts/allContacts?paginate=10&page=1&sort=name
- find  (ver contato especifico) (GET)  /api/contacts/find?personal_collection_id=1 
- allLoansWithContact (ver todos os itens emprestados com um contato especifico) (GET) /api/contacts/allLoansWithContact?contact_id=1
- update (atualizar um contato) (POST) /api/contacts/update
- create (criar um contato) (POST) /api/contacts/create