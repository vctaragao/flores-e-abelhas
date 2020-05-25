@servers(['web' => 'deployer@' . $server])

@setup
$repository = 'git@gitlab.com:vct.aragao/flores-e-abelhas.git';
$releases_dir = '/var/www/'. $dirname . '/releases';
$app_dir = '/var/www/'. $dirname;
$release = date('YmdHis');
$new_release_dir = $releases_dir .'/'. $release;
@endsetup

@story('deploy')
setup_app_dir
clone_repository_dev
run_composer
create_links
create_storage
migrate_database_dev
create_env
generete_keys
@endstory

@task('setup_app_dir')
echo $branch
echo 'Checking app dir'
[ -d {{ $app_dir }} ] && echo "Exists" || mkdir {{ $app_dir }}
@endtask

@task('clone_repository_dev')
echo 'Cloning repository'
[ -d {{ $releases_dir }} ] || mkdir {{ $releases_dir }}
git clone --depth 1 {{ $repository }} {{ $new_release_dir }}
cd {{ $new_release_dir }}
git reset --hard {{ $commit }}
@endtask

@task('clone_repository_prod')
echo 'Cloning repository'
[ -d {{ $releases_dir }} ] || mkdir {{ $releases_dir }}
git clone --depth 1 {{ $repository }} {{ $new_release_dir }}
cd {{ $new_release_dir }}
git reset --hard {{ $commit }}
@endtask

@task('run_composer')
echo "Starting deployment ({{ $release }})"
cd {{ $new_release_dir }}
composer install --prefer-dist --no-scripts -q -o
@endtask

@task('create_links')
echo "Linking storage directory"
rm -rf {{ $new_release_dir }}/storage
ln -nfs {{ $app_dir }}/storage {{ $new_release_dir }}/storage

echo 'Linking .env file'
ln -nfs {{ $app_dir }}/.env {{ $new_release_dir }}/.env

echo 'Linking current release'
ln -nfs {{ $new_release_dir }} {{ $app_dir }}/current

echo 'Linking public to storage app'

cd {{ $new_release_dir }}
php artisan storage:link
@endtask

@task('create_storage')
echo "Creating storage and sub folders"
if ! [ -d {{$app_dir }}/storage ]
then
mkdir {{ $app_dir }}/storage
mkdir {{ $app_dir }}/storage/framework
mkdir {{ $app_dir }}/storage/framework/cache
mkdir {{ $app_dir }}/storage/framework/sessions
mkdir {{ $app_dir }}/storage/framework/views

elif ! [ -d {{ $app_dir}}/storage/framework ]
then
mkdir {{ $app_dir }}/storage/framework
mkdir {{ $app_dir }}/storage/framework/cache
mkdir {{ $app_dir }}/storage/framework/sessions
mkdir {{ $app_dir }}/storage/framework/views

elif ! [ -d {{ $app_dir }}/storage/framework/cache ]
then
mkdir {{ $app_dir }}/storage/framework/cache

elif ! [ -d {{ $app_dir }}/storage/framework/sessions ]
then
mkdir {{ $app_dir }}/storage/framework/sessions

elif ! [ -d {{ $app_dir }}/storage/framework/views ]
then
mkdir {{ $app_dir }}/storage/framework/views

fi
@endtask

@task('migrate_database_dev')
if [ -f {{ $app_dir }}/.env ]
then
echo "Migrating the database dev"
cd {{ $new_release_dir }}
php artisan migrate:fresh --seed
else
echo ".env not yet configured"
fi
@endtask

@task('create_env')
echo "Creating .env file"
[ -f {{ $app_dir }}/.env ] || cp {{ $new_release_dir }}/.env.example {{ $app_dir }}/.env
@endtask

@task('generete_keys')
echo "Generating APP KEY"
cd {{ $new_release_dir }}
php artisan key:generate
@endtask

@task('install_npm')
cd {{ $new_release_dir }}
npm install
@endtask