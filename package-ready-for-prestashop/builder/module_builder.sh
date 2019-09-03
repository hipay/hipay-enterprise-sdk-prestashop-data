#!/usr/bin/env bash

version=1.0.0

function cleanAndPackage()
{
    cp -R src/hipay_enterprise_data hipay_enterprise_data
    ############################################
    #####          CLEAN IDEA FILE           ####
    ############################################
    if [ -d hipay_enterprise_data/nbproject ]; then
        rm -R hipay_enterprise_data/nbproject
    fi

    if [ -d hipay_enterprise_data/.idea ]; then
        rm -R hipay_enterprise_data/.idea
    fi

    find hipay_enterprise_data/ -type d -exec cp index.php {} \;
    zip -r package-ready-for-prestashop/hipay-enterprise-sdk-prestashop-data-$version.zip hipay_enterprise_data
    rm -R hipay_enterprise_data
}

function show_help()
{
	cat << EOF
Usage: $me [options]

options:
    -h, --help                        Show this help
    -v, --version                     Configure version for package
EOF
}

function parse_args()
{
	while [[ $# -gt 0 ]]; do
		opt="$1"
		shift

		case "$opt" in
			-h|\?|--help)
				show_help
				exit 0
				;;
				esac
		case "$opt" in
			-v|--version)
              	version="$1"
				shift
				;;
		    esac
	done;
}

function main()
{
	parse_args "$@"
	cleanAndPackage
}

main "$@"

