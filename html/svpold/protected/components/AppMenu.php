<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppMenu
 *
 * @author hzubieta
 */
class AppMenu
{

    static function getMenu()
    {
        return
            array(
                'items' => array(
                    array(
                        'label' => 'Inicio',
                        'url' =>  "user/myPendingReports",
                        'visible' => Yii::app()->user->isValidUser
                    ),
                    array(
                        'label' => 'S&V Estudios',
                        'visible' => Yii::app()->user->isSesUser,
                        'url' => array('backgroundCheck/admin'),
                        'visible' => (Yii::app()->user->isValidUser) ,
                        'items' => array(
                            array(
                                'label' => 'Estudios',
                                'url' => array('backgroundCheck/admin'),
                                'visible' => (Yii::app()->user->isValidUser),
                                'items' => array(
                                    array('label' => 'VCSP', 'url' => array('backgroundCheck/admin')),
                                    array('label' => 'Estudios Pendientes', 'url' => array('user/myPendingReports')),
                                    array(
                                        'label' => 'Solicitar estudio',
                                        'url' => array('backgroundCheck/create', 'pc' => false),
                                        'visible' => Yii::app()->user->isAdmin
                                    ),
                                    array(
                                        'label' => 'Solicitar estudio de empresa',
                                        'url' => array('backgroundCheck/createCompanySurvey', 'pc' => false),
                                        'visible' => Yii::app()->user->isAdmin
                                    ),
                                    array(
                                        'label' => 'Solicitar multiples estudios',
                                        'url' => array('backgroundCheck/createMultiple', 'pc' => false),
                                        'visible' => Yii::app()->user->isAdmin
                                    ),
                                    array(
                                        'label' => 'Solicitar multiples estudios de empresa',
                                        'url' => array('backgroundCheck/createMultipleCompany', 'pc' => false),
                                        'visible' => Yii::app()->user->isAdmin
                                    ),

                                )
                            ),
                            array(
                                'label' => 'Reportes',
                                'url' => array('site/index'),
                                'visible' => Yii::app()->user->isAdmin,
                                'items' => array(
                                    array('label' => 'Resultados', 'url' => array('report/pieStudiesResult')),
                                    array('label' => 'Mes', 'url' => array('report/barStudiesResult')),
                                    array('label' => 'Cliente', 'url' => array('report/barStudiesResultByCustomer')),
                                    array('label' => 'Cliente y Producto', 'url' => array('report/studiesResultByCustomerReportType')),
                                    array(
                                        'label' => 'Pendientes a hoy',
                                        'url' => array('backgroundCheckReport/pendingReportsUntilToday'),
                                        'visible' => Yii::app()->user->isAdmin,
                                    ),
                                    array(
                                        'label' => 'Pendientes CSV',
                                        'url' => array('backgroundCheckReport/pendingReportsCSV'),
                                        'visible' => Yii::app()->user->isAdmin,
                                    ),
                                    array(
                                        'label' => 'Export Estudios Movidos',
                                        'url' => array('backgroundCheckReport/Studymove'),
                                        'visible' => Yii::app()->user->isManager,
                                    ),
                                    array(
                                        'label' => 'Plan de Trabajo Diario CSV',
                                        'url' => array('backgroundCheckReport/exportworkplanCSV'),
                                        'visible' => Yii::app()->user->isAdmin,
                                    ),
                                    array(
                                        'label' => 'Export novedades reportadas a SAC',
                                        'url' => array('event/exportEventSACCSV'),
                                        'visible' => Yii::app()->user->isAdmin,
                                    ),
                                    array(
                                        'label' => 'Export Clientes SAC',
                                        'url' => array('backgroundCheckReport/clientsSacCSV', 'pc' => false),
                                        'visible' => Yii::app()->user->isAdmin
                                    ),
                                )
                            ),
                            array(
                                'label' => 'Consulta OFAC-PEPS',
                                'url' => array('site/index'),
                                'visible' => Yii::app()->user->isValidUser,
                                'items' => array(
                                    array(
                                        'label' => 'Actualizar Listas Peps',
                                        'url' => array('SDN/updatePepsSdn'),
                                        'visible' => Yii::app()->user->isAdmin,
                                    ),
                                    array(
                                        'label' => 'Actualizar Lista de OFAC',
                                        'url' => array('SDN/updateOfacSdn'),
                                        'visible' => Yii::app()->user->isAdmin,
                                    ),
                                    array(
                                        'label' => 'Actualizar Lista de ONU',
                                        'url' => array('SDN/updateUn'),
                                        'visible' => Yii::app()->user->isAdmin,
                                    ),
                                    array('label' => 'Consulta', 'url' => array('SDN/query')),
                                    array('label' => 'Listado', 'url' => array('SDN/admin')),
                                )
                            ),
                            array(
                                'label' => 'Consulta Contactos',
                                'items' => array(
                                    array('label' => 'Listado de Contactos Académico', 'url' => array('educationalInstitution/admin')),
                                    array('label' => 'Listado de Contactos Laboral', 'url' => array('jobCompany/admin')),
                                    //array('label' => 'Crear Contacto', 'url' => array('educationalInstitution/create')),
                                )
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Control de Estudios',
                        'visible' => /* Yii::app()->user->isValidUser */ Yii::app()->user->isAdmin,
                        'items' => array(
                            array('label' => 'Listado de Estudios', 'url' => array('backgroundCheck/pcAdmin'),),
                            array('label' => 'Crear Estudio', 'url' => array('backgroundCheck/create', $pc = true),),
                            array('label' => 'Asignar Masiva Estudios', 'url' => array('backgroundCheck/selectForAssign'), 'visible' => Yii::app()->user->isAdmin,),
                            array('label' => 'Envíos Masivos Contacto', 'url' => array('backgroundCheck/sendMassiveContacts'), 'visible' => Yii::app()->user->isAdmin,),
                            array('label' => 'Envíos Masivos Recaudo', 'url' => array('backgroundCheck/sendMassiveRecover'), 'visible' => Yii::app()->user->isAdmin,),
                            array(
                                'label' => 'Exports Coface',
                                'visible' => Yii::app()->user->isAdmin,
                                'items' => array(
                                    array('label' => 'Importaciones', 'url' => array('verificationSection/csvImportCoface'),),
                                    array('label' => 'Exportaciones', 'url' => array('verificationSection/csvExportCoface'),),
                                    array('label' => 'Compañia', 'url' => array('verificationSection/csvCompanyCoface'),),
                                    array('label' => 'Persona de Contacto', 'url' => array('verificationSection/csvContactPersonCoface'),),
                                    array('label' => 'Accionistas', 'url' => array('verificationSection/csvShareHoldersCoface'),),
                                    array('label' => 'Direccíon', 'url' => array('verificationSection/csvAddressCoface'),),
                                    array('label' => 'Comentarios', 'url' => array('verificationSection/csvCommentsCoface'),),
                                    array('label' => 'Analisis Financiero', 'url' => array('verificationSection/csvFinantialAnalysCoface'),),
                                    array('label' => 'Seguimiento', 'url' => array('verificationSection/csvTrakingCoface'),),
                                    array('label' => 'Referencias Comerciales', 'url' => array('verificationSection/csvCommercialRefCoface'),),
                                ),
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Bases Operaciones',
                        'visible' => Yii::app()->user->isAdmin,
                        'items' => array(
                            array(
                                'label' => 'Solicitudes SAC',
                                'visible' => Yii::app()->user->isRequestsSAC,
                                'items' => array(
                                    array('label' => 'Listado de Solicitudes SAC', 'url' => array('requestsSAC/admin')),
                                    array('label' => 'Crear Solicitud SAC', 'url' => array('requestsSAC/create', $pc = true)),
                                ),
                            ),
                            array(
                                'label' => 'Programación Integridad',
                                'visible' => Yii::app()->user->isAdmin,
                                'items' => array(
                                    array('label' => 'Asignar Llamadas', 'url' => array('candidateCalls/admintoAssign')),
                                    array('label' => 'Llamadas a Cargo', 'url' => array('candidateCalls/admintoManager', $pc = true)),
                                    array('label' => 'Todas las Llamadas', 'url' => array('candidateCalls/admin', $pc = true)),
                                ),
                            ),
                            array(
                                'label' => 'Indicadores Senior',
                                'visible' => Yii::app()->user->isAdmin,
                                'items' => array(
                                    array('label' => 'Asignación Analistas', 'url' => array('user/adminSenior')),
                                ),
                            ),
                            array(
                                'label' => 'Piloto',
                                'visible' => Yii::app()->user->isAdmin,
                                'items' => array(
                                    array('label' => 'Clientes Piloto', 'url' => array('backgroundCheck/admintoPiloto')),
                                ),
                            ),
                            array(
                                'label' => 'Acuerdos',
                                'visible' => Yii::app()->user->isAdmin,
                                'items' =>  array(
                                    array('label' => 'Listado de Acuerdos', 'url' =>  array('agreements/admin')),
                                    array(
                                        'label' => 'Crear Acuerdo', 'url' =>  array('agreements/create', $pc = true),
                                        'visible' => Yii::app()->user->isAgreements
                                    ),
                                ),
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Facturación Visitas',
                        'visible' =>  Yii::app()->user->isValidUser, //Yii::app()->user->isAdmin,
                        'items' => array(
                            array(
                                'label' => 'Corte',
                                'visible' => Yii::app()->user->isAdmin,
                                'items' => array(
                                    array('label' => 'Corte Facturación Visitas', 'url' => array('visitInvoiceDate/admin')),
                                    array('label' => 'Crear Corte Facturación', 'url' => array('visitInvoiceDate/create', $pc = true)),
                                ),
                            ),
                            array(
                                'label' => 'Costos Visitas',
                                'visible' =>  Yii::app()->user->isAdmin,
                                'items' => array(
                                    array('label' => 'Crear Costo Visita', 'url' => array('invoiceVisitCost/create', $pc = true)),
                                    array('label' => 'Lista de Costos Visita', 'url' => array('invoiceVisitCost/admin')),
                                ),
                            ),
                            array(
                                'label' => 'Facturación por Visitador',
                                'url' => array('invoiceVisit/admin'),
                                //'visible' =>'',
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Admin',
                        'visible' => Yii::app()->user->isAdmin,
                        'items' => array(
                            array(
                                'label' => 'Clientes',
                                'items' => array(
                                    array('label' => 'Listado de Clientes', 'url' => array('customer/admin')),
                                    array('label' => 'Crear Cliente', 'url' => array('customer/create')),
                                ),
                            ),
                            array(
                                'label' => 'Productos de Cliente',
                                'items' => array(
                                    array('label' => 'Productos', 'url' => array('customerProduct/admin')),
                                    array('label' => 'Crear Producto', 'url' => array('customerProduct/create')),
                                    array('label' => 'Archivos', 'url' => array('AttachmentFile/admin')),
                                    array('label' => 'Agregar Archivo', 'url' => array('AttachmentFile/create')),
                                ),
                            ),
                            array(
                                'label' => 'Usuarios de Cliente',
                                'items' => array(
                                    array('label' => 'Usuarios de Cliente', 'url' => array('customerUser/admin')),
                                    array('label' => 'Crear Usuario de Cli.', 'url' => array('customerUser/create')),
                                ),
                            ),
                            array(
                                'label' => 'Grupos de Clientes',
                                'items' => array(
                                    array('label' => 'Listado de Grupos', 'url' => array('customerGroup/admin')),
                                    array('label' => 'Crear Grupo', 'url' => array('customerGroup/create')),
                                ),
                            ),
                            array(
                                'label' => 'Facturas de Clientes',
                                'items' => array(
                                    array('label' => 'Listado de Facturas', 'url' => array('invoice/admin')),
                                    array('label' => 'Crear factura', 'url' => array('invoice/create')),
                                    array('label' => 'Reporte Productividad', 'url' => array('backgroundCheckReport/productionReport')),
                                    array('label' => 'Reporte Productividad Cant.', 'url' => array('backgroundCheckReport/productionReportQty')),
                                    array('label' => 'Reporte Productividad CSV', 'url' => array('backgroundCheckReport/productionReportCSV')),
                                ),
                                'visible' => Yii::app()->user->isBilling,
                            ),
                            array(
                                'label' => 'Productos',
                                'items' => array(
                                    array('label' => 'Listado de Productos', 'url' => array('product/admin')),
                                    array('label' => 'Crear Producto', 'url' => array('product/create')),
                                ),
                                'visible' => Yii::app()->user->isBilling,
                            ),
                            array(
                                'label' => 'Export Usuarios Cliente',
                                'url' => array('backgroundCheckReport/listclientsActive'),
                                'visible' => Yii::app()->user->isManager || Yii::app()->user->name == 'jcuellar@sintecto.com',
                            ),
                        ),
                    ),
                    array(
                        'label' => '<b>SYS Admin</b>', 'url' => array('site/index'), 'visible' => Yii::app()->user->isSuperAdmin,
                        'items' => array(
                            array(
                                'label' => 'Usuarios',
                                'items' => array(
                                    array('label' => 'Log del Sistema', 'url' => array('log/admin')),
                                    array('label' => 'Usuarios', 'url' => array('user/admin')),
                                    array('label' => 'Crear Usuario', 'url' => array('user/create')),
                                    array(
                                        'label' => 'Log de Ingreso', 'url' => array('backgroundCheckReport/logEntry'),
                                        'visible' => Yii::app()->user->name == 'jcocoma@sintecto.com' || Yii::app()->user->name == 'jmontero@sintecto.com'
                                    ),
                                )
                            ),
                            array(
                                'label' => 'Festivos',
                                'items' => array(
                                    array('label' => 'Listado de Festivos', 'url' => array('holiday/admin')),
                                    array('label' => 'Creación de Festivo', 'url' => array('holiday/create')),
                                )
                            ),
                            array(
                                'label' => 'Secciones',
                                'items' => array(
                                    array('label' => 'Listado de Secciones', 'url' => array('verificationSectionType/admin')),
                                    array('label' => 'Nueva Sección XML', 'url' => array('verificationSectionType/create')),
                                    array('label' => 'Nueva Sección HTML', 'url' => array('verificationSectionType/createHtml')),
                                )
                            ),
                            array(
                                'label' => 'Preguntas de Sección',
                                'items' => array(
                                    array('label' => 'Preguntas de Sección', 'url' => array('sectionTypeQuestion/admin')),
                                    array('label' => 'Nueva Pregunta de Sección', 'url' => array('sectionTypeQuestion/create')),
                                )
                            ),
                            array(
                                'label' => 'Plantillas de Reporte',
                                'items' => array(
                                    array('label' => 'Plantillas de Reporte', 'url' => array('pdfReportType/admin')),
                                    array('label' => 'Crear Plantilla de Reporte', 'url' => array('pdfReportType/create')),
                                ),
                                'visible' => Yii::app()->user->isSuperAdmin,
                            ),
                            array('label' => 'Estados de VCSP', 'url' => array('backgroundCheckStatus/admin'),),
                            array('label' => 'Tipos de actividad', 'url' => array('activityType/admin')),
                            array(
                                'label' => 'Grupos de Secciones',
                                'items' => array(
                                    array('label' => 'Listado de Groups', 'url' => array('verificationSectionGroup/admin')),
                                    array('label' => 'Crear Grupo', 'url' => array('verificationSectionGroup/create')),
                                ),
                            ),
                            array(
                                'label' => 'Resultados Area Operaciones', 'url' => array('qualityPorc/resultoperations'),
                                'visible' => Yii::app()->user->isResultOperation,
                            ),
                            array(
                                'label' => 'Visitadores',
                                'items' => array(
                                    array('label' => 'Link de Encuesta', 'url' => array('SurveyLink/admin')),
                                    array('label' => 'Crear Link', 'url' => array('SurveyLink/create')),
                                ),
                            ),
                            array(
                                'label' => 'JSON Formularios Dinámico',
                                'items' => array(
                                    array('label' => 'Lista de FD', 'url' => array('DynamicFormJSON/admin')),
                                    array('label' => 'Crear JSON FD', 'url' => array('DynamicFormJSON/create')),
                                ),
                            ),

                            array(
                                'label' => 'Sistema',
                                'items' => array(
                                    array('label' => 'Mantenimiento', 'url' => array('backgroundCheck/mainteinance')),
                                    array('label' => 'Depuracion Documentos', 'url' => array('backgroundCheck/formdataDoc'), 'visible' => Yii::app()->user->isManager),
                                )
                            ),
                        ),
                    ),

                    array(
                        'label' => 'Configuración',
                        'url' => array('site/index'),
                        'visible' => Yii::app()->user->isValidUser,
                        'items' => array(
                            array('label' => 'Cambio de Clave de Usuario', 'url' => array('site/changePassword')),
                            array('label' => 'Cambio de Clave de PDF', 'url' => array('site/changePdfPassword')),
                            //                            array('label' => 'Preferencias', 'url' => array('site/index')),
                            array('label' => 'Cerrar Sesión', 'url' => array('/site/logout'),),
                        )
                    ),

                    array('label' => 'Inicio', 'url' => array('site/login'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => 'Cerrar Sesión', 'url' => array('/site/logout'), 'visible' => Yii::app()->user->isValidUser),
                    array(
                        'label' => 'Ayuda',
                        'items' => array(
                            array('label' => 'Ayuda', 'url' => array('/site/help'), 'visible' => Yii::app()->user->isValidUser),
                            array('label' => 'Instructivos', 'url' => array('/site/instructive'), 'visible' => Yii::app()->user->isValidUser),
                            array('label' => 'PQR', 'url' => array('PQR/admin'), 'visible' => Yii::app()->user->isValidUser),
                        )
                    ),
                ),
            );
    }

    //put your code here
}
