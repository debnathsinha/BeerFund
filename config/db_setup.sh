
if [ $# -lt 1 ]
then
	echo "Usage:"
	echo "bash db_setup.sh setup"
	echo "bash db_setup.sh destroy"
	echo "bash db_setup.sh database"
	echo "bash db_setup.sh tables"
	echo "bash db_setup.sh show"
fi

case "$1" in
setup)
	echo "Setting up database beerfund"
	mysql -u root -p < create_user.sql
	;;
destroy)
	echo "Destroying database beerfund"
	mysql --user=beerfund --password=beerfund < clean_db.sql
	;;
tables)
	echo "Creating tables"
	mysql --user=beerfund --password=beerfund < create_tables.sql
	;;
database)
	echo "Creating database"
	mysql --user=beerfund --password=beerfund < create_db.sql
	;;
show)
	echo "Showing tables in beerfund"
	mysql --user=beerfund --password=beerfund < show_tables.sql
	;;
esac
