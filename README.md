## php artisan route:list --path=api

## php artisan route:list --path=api/v1

## php artisan make:resource TaskResource

## php artisan make:controller Auth/LoginController -i

## php artisan make:controller Auth/LogoutController -i

## php artisan make:request LoginRequest

## php artisan tinker

## App\Models\User::factory()->create()

## php artisan migrate:fresh --seed

    name: "Lola Connelly",
    email: "brown.destinee@example.net",
    email_verified_at: "2023-07-25 20:17:01",
    #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
    #remember_token: "vg8T7nDrlT",
    updated_at: "2023-07-25 20:17:01",
    created_at: "2023-07-25 20:17:01",
    id: 1,

pm.sendRequest({
url: "http://localhost:8000/sanctum/csrf-cookie",
method: "GET"
},function (err,res,{ cookies }){
if(!err){
pm.globals.set('csrf-token',cookies.get('XSRF-TOKEN'))
}
})
