<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

<style>
    .filepond--root .filepond--credits {
        display: none;
    }

    .filepond--panel-root {
        /* background-color: #ffffff; */
        /* box-shadow: 0 3px 10px rgba(0, 0, 0, 0.04); */
        /* border: 1px solid #ced4da; */
    }

    .filepond--drop-label {
        /* color: #355d88 */
    }

    .select2-container {
        width: 100% !important;
    }

    .select2-container--default .select2-selection--multiple {
        border-color: rgb(209 213 219) !important;
    }

    .select2-container--default .select2-selection--single {
        border-color: rgb(209 213 219) !important;

    }

    .select2-container .select2-search--inline .select2-search__field .select2-container {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }

    .select2-container .select2-selection--multiple,
    .select2-container,
    .select2-selection--single {
        min-height: 42px !important;
        margin-top: 2px;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: rgb(209 213 250) !important;
    }

    .select2-container .select2-search--inline .select2-search__field {
        margin-top: 9px !important;
        height: 24px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        margin-top: 6px !important;
        height: 24px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__clear {
        height: 42px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 42px !important;

    }

    .select2-container--default .select2-results__option--disabled {
        /* color: #000 !important; */
    }


    /**/
    .menu {
        /* width: 300px; */
        margin: auto;
    }

    .tree {
        list-style: none;
        padding-left: 20px;
        position: relative;
        color: rgb(39, 39, 39);
    }

    .tree:before {
        content: '';
        width: 1px;
        background: rgb(39, 39, 39);
        top: -7px;
        bottom: 7px;
        left: 0;
        position: absolute;
    }

    .tree li {
        position: relative;
        margin-top: 10px;
    }

    .tree li:hover,
    .tree li:focus {
        color: #000000;
        cursor: pointer;
    }

    .tree li:before {
        content: '';
        width: 22px;
        height: 1px;
        background: rgb(39, 39, 39);
        top: 17px;
        left: -20px;
        position: absolute;
    }

    .tree .tree {
        /* display: none; */
    }
</style>
