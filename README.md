TEST TASK: Backend PHP & Laravel. Project is dockerized with Laravel Sail. https://laravel.com/docs/9.x/sail#starting-and-stopping-sail

Steps to run:


1. mv .env.example .env (just for test purposes all "credentials" are in .env.example file)
2. sail up -d 
3. sail artisan migrate
3. sail artisan db:seed
4. sail artisan queue:work
5. run command by hand for testing purposes, just for not waiting untill task scheduler will fire for creating & charging invoices - sail artisan command:create-and-charge-invoice
___________

Test Task Description:
Users tableda - 1 000 000 user malumotlari bor.
Userlari Har kuni kechqurun 00:00 da
1. verified bolsa,
2. business user bolmasa,
3. Service Stop qilinmagan bolsa, Userlar kamida 80s0 000 - 900 000 get boladi


Shulari Invoices tablega Insert qilish kerak kuniga bir marta. Create qilgandan kn. Kun davomida  invoices 800-900 ming donani 3 soat ichida Queue orqali obrabotka qilib chiqish kerak barcha create qilingan invoicelari.
