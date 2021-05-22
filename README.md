# API com Lumen PHP Framework
- Crie uma base de dados com o nome de (projeto_lumen)
- Execute os seguintes comandos: php artisan migrate - php artisan db:seed
- para gerar o seu token de api basta fazer uma requisição get na seguinte rota: /api/authenticate?email=teste@teste.com.br&password=123456
  
# ROUTE personalCollection
- allCollection (listar toda a coleção) /api/personalCollection/allCollection?paginate=10&page=1&sort=type
- types  (possiveis tipos para a colção)  /api/personalCollection/types 
- find  (ver item especifico)  /api/personalCollection/find?personal_collection_id=1 
- update (atualizar item) /api/personalCollection/update
- create (criar um item) /api/personalCollection/create

# ROUTE Contacts
- allContacts (listar todos contatos) /api/personalCollection/allCollection?paginate=10&page=1&sort=type
- find  (ver contato especifico)  /api/personalCollection/find?personal_collection_id=1 
- allLoansWithContact (ver todos os itens emprestados com um contato especifico) /api/contacts/allLoansWithContact?contact_id=1
- update (atualizar um contato) /api/contacts/update
- create (criar um contato) /api/contacts/create