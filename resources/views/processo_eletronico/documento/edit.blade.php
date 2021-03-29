<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Processo :nup', ['nup' => $processoEletronico->nup17]) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="pb-5">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ __('Documento :protocolo', ['protocolo' => $documento->protocolo]) }}
                        </h3>
                    </div>

                    <div class="live-snippet">
                        <div class="document-editor">
                            <div class="document-editor__toolbar"></div>
                            <div class="document-editor__editable-container">
                                <div class="document-editor__editable">
                                    <header>
                                        olá
                                    </header>
                                </div>
                            </div>
                        </div>

                        <style>
                            .document-editor {
                                border: 1px solid var(--ck-color-base-border);
                                border-radius: var(--ck-border-radius);

                                /* Set vertical boundaries for the document editor. */
                                max-height: 700px;

                                /* This element is a flex container for easier rendering. */
                                display: flex;
                                flex-flow: column nowrap;
                            }

                            .document-editor__toolbar {
                                /* Make sure the toolbar container is always above the editable. */
                                z-index: 1;

                                /* Create the illusion of the toolbar floating over the editable. */
                                box-shadow: 0 0 5px hsla(0, 0%, 0%, .2);

                                /* Use the CKEditor CSS variables to keep the UI consistent. */
                                border-bottom: 1px solid var(--ck-color-toolbar-border);
                            }

                            /* Adjust the look of the toolbar inside of the container. */
                            .document-editor__toolbar .ck-toolbar {
                                border: 0;
                                border-radius: 0;
                            }

                            /* Make the editable container look like the inside of a native word processor app. */
                            .document-editor__editable-container {
                                padding: calc(2 * var(--ck-spacing-large));
                                background: var(--ck-color-base-foreground);

                                /* Make it possible to scroll the "page" of the edited content. */
                                overflow-y: scroll;
                            }

                            .document-editor__editable-container .document-editor__editable.ck-editor__editable {
                                /* Set the dimensions of the "page". */
                                width: 210mm;
                                height: 296mm;
                                min-height: 21cm;

                                /* Keep the "page" off the boundaries of the container. */
                                padding: 20mm;

                                border: 1px hsl(0, 0%, 82.7%) solid;
                                border-radius: var(--ck-border-radius);
                                background: white;

                                /* The "page" should cast a slight shadow (3D illusion). */
                                box-shadow: 0 .5mm 2mm rgba(0, 0, 0, .3);
                                /* Center the "page". */
                                margin: 5mm auto;
                            }

                            /* Override the page's width in the "Examples" section which is wider. */
                            .main__content-wide .document-editor__editable-container .document-editor__editable.ck-editor__editable {
                                width: 18cm;
                            }

                            /* Set the default font for the "page" of the content. */
                            .document-editor .ck-content,
                            .document-editor .ck-heading-dropdown .ck-list .ck-button__label {
                                font: 16px/1.6 "Helvetica Neue", Helvetica, Arial, sans-serif;
                            }

                            /* Adjust the headings dropdown to host some larger heading styles. */
                            .document-editor .ck-heading-dropdown .ck-list .ck-button__label {
                                line-height: calc(1.7 * var(--ck-line-height-base) * var(--ck-font-size-base));
                                min-width: 6em;
                            }

                            /* Scale down all heading previews because they are way too big to be presented in the UI.
                        Preserve the relative scale, though. */
                            .document-editor .ck-heading-dropdown .ck-list .ck-heading_heading1 .ck-button__label,
                            .document-editor .ck-heading-dropdown .ck-list .ck-heading_heading2 .ck-button__label {
                                transform: scale(0.8);
                                transform-origin: left;
                            }

                            /* Set the styles for "Heading 1". */
                            .document-editor .ck-content h2,
                            .document-editor .ck-heading-dropdown .ck-heading_heading1 .ck-button__label {
                                font-size: 2.18em;
                                font-weight: normal;
                            }

                            .document-editor .ck-content h2 {
                                line-height: 1.37em;
                                padding-top: .342em;
                                margin-bottom: .142em;
                            }

                            /* Set the styles for "Heading 2". */
                            .document-editor .ck-content h3,
                            .document-editor .ck-heading-dropdown .ck-heading_heading2 .ck-button__label {
                                font-size: 1.75em;
                                font-weight: normal;
                                color: hsl(203, 100%, 50%);
                            }

                            .document-editor .ck-heading-dropdown .ck-heading_heading2.ck-on .ck-button__label {
                                color: var(--ck-color-list-button-on-text);
                            }

                            /* Set the styles for "Heading 2". */
                            .document-editor .ck-content h3 {
                                line-height: 1.86em;
                                padding-top: .171em;
                                margin-bottom: .357em;
                            }

                            /* Set the styles for "Heading 3". */
                            .document-editor .ck-content h4,
                            .document-editor .ck-heading-dropdown .ck-heading_heading3 .ck-button__label {
                                font-size: 1.31em;
                                font-weight: bold;
                            }

                            .document-editor .ck-content h4 {
                                line-height: 1.24em;
                                padding-top: .286em;
                                margin-bottom: .952em;
                            }

                            /* Make the block quoted text serif with some additional spacing. */
                            .document-editor .ck-content blockquote {
                                font-family: Georgia, serif;
                                margin-left: calc(2 * var(--ck-spacing-large));
                                margin-right: calc(2 * var(--ck-spacing-large));
                            }

                            @media only screen and (max-width: 960px) {

                                /* Because on mobile 2cm paddings are to big. */
                                .document-editor__editable-container .document-editor__editable.ck-editor__editable {
                                    padding: 1.5em;
                                }
                            }

                            @media only screen and (max-width: 1200px) {
                                .main__content-wide .document-editor__editable-container .document-editor__editable.ck-editor__editable {
                                    width: 100%;
                                }
                            }

                            /* Style document editor a'ka Google Docs.*/
                            @media only screen and (min-width: 1360px) {
                                .main .main__content.main__content-wide {
                                    padding-right: 0;
                                }
                            }

                            @media only screen and (min-width: 1600px) {
                                .main .main__content.main__content-wide {
                                    width: 24cm;
                                }

                                .main .main__content.main__content-wide .main__content-inner {
                                    width: auto;
                                    margin: 0 50px;
                                }

                                /* Keep "page" look based on viewport width. */
                                .main__content-wide .document-editor__editable-container .document-editor__editable.ck-editor__editable {
                                    width: 60%;
                                }
                            }
                        </style>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>