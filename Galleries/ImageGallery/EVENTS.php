<?php
$page_title = 'The parameters dictionary contains a null entry for parameter ';
$banner_title = 'The parameters dictionary contains a null entry for parameter ';
$banner_category = 'Galleries';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card">
          <div class="content-card-body">
            <span><H1>Server Error in '/cms' Application.<hr width=100% size=1 color=silver></H1>

            <h2> <i>The parameters dictionary contains a null entry for parameter 'id' of non-nullable type 'System.Int32' for method 'System.Threading.Tasks.Task`1[System.Web.Mvc.ActionResult] ImageGallery(Int32)' in 'UniversityManagementSystem.Areas.Website.Controllers.GalleriesController'. An optional parameter must be a reference type, a nullable type, or be declared as an optional parameter.<br>Parameter name: parameters</i> </h2></span>

            <font face="Arial, Helvetica, Geneva, SunSans-Regular, sans-serif ">

            <b> Description: </b>An unhandled exception occurred during the execution of the current web request. Please review the stack trace for more information about the error and where it originated in the code.

            <br><br>

            <b> Exception Details: </b>System.ArgumentException: The parameters dictionary contains a null entry for parameter 'id' of non-nullable type 'System.Int32' for method 'System.Threading.Tasks.Task`1[System.Web.Mvc.ActionResult] ImageGallery(Int32)' in 'UniversityManagementSystem.Areas.Website.Controllers.GalleriesController'. An optional parameter must be a reference type, a nullable type, or be declared as an optional parameter.<br>Parameter name: parameters<br><br>

            <b>Source Error:</b> <br><br>

            <table class="table table-bordered table-hover align-middle" width=100% bgcolor="#ffffcc">
               <tr>
                  <td>
                      <code>

An unhandled exception was generated during the execution of the current web request. Information regarding the origin and location of the exception can be identified using the exception stack trace below.                      </code>

                  </td>
               </tr>
            </table>

            <br>

            <b>Stack Trace:</b> <br><br>

            <table class="table table-bordered table-hover align-middle" width=100% bgcolor="#ffffcc">
               <tr>
                  <td>
                      <code><pre>

[ArgumentException: The parameters dictionary contains a null entry for parameter &#39;id&#39; of non-nullable type &#39;System.Int32&#39; for method &#39;System.Threading.Tasks.Task`1[System.Web.Mvc.ActionResult] ImageGallery(Int32)&#39; in &#39;UniversityManagementSystem.Areas.Website.Controllers.GalleriesController&#39;. An optional parameter must be a reference type, a nullable type, or be declared as an optional parameter.
Parameter name: parameters]
   System.Web.Mvc.ActionDescriptor.ExtractParameterFromDictionary(ParameterInfo parameterInfo, IDictionary`2 parameters, MethodInfo methodInfo) +433
   System.Linq.WhereSelectArrayIterator`2.MoveNext() +78
   System.Linq.Buffer`1..ctor(IEnumerable`1 source) +158
   System.Linq.Enumerable.ToArray(IEnumerable`1 source) +93
   System.Web.Mvc.Async.TaskAsyncActionDescriptor.BeginExecute(ControllerContext controllerContext, IDictionary`2 parameters, AsyncCallback callback, Object state) +217
   System.Web.Mvc.Async.&lt;&gt;c__DisplayClass8_0.&lt;BeginInvokeAsynchronousActionMethod&gt;b__0(AsyncCallback asyncCallback, Object asyncState) +46
   System.Web.Mvc.Async.WrappedAsyncResultBase`1.Begin(AsyncCallback callback, Object state, Int32 timeout) +163
   System.Web.Mvc.Async.AsyncControllerActionInvoker.BeginInvokeAsynchronousActionMethod(ControllerContext controllerContext, AsyncActionDescriptor actionDescriptor, IDictionary`2 parameters, AsyncCallback callback, Object state) +269
   System.Web.Mvc.Async.AsyncInvocationWithFilters.InvokeActionMethodFilterAsynchronouslyRecursive(Int32 filterIndex) +108
   System.Web.Mvc.Async.AsyncInvocationWithFilters.InvokeActionMethodFilterAsynchronouslyRecursive(Int32 filterIndex) +1022
   System.Web.Mvc.Async.&lt;&gt;c__DisplayClass7_0.&lt;BeginInvokeActionMethodWithFilters&gt;b__0(AsyncCallback asyncCallback, Object asyncState) +100
   System.Web.Mvc.Async.WrappedAsyncResultBase`1.Begin(AsyncCallback callback, Object state, Int32 timeout) +163
   System.Web.Mvc.Async.AsyncControllerActionInvoker.BeginInvokeActionMethodWithFilters(ControllerContext controllerContext, IList`1 filters, ActionDescriptor actionDescriptor, IDictionary`2 parameters, AsyncCallback callback, Object state) +303
   System.Web.Mvc.Async.&lt;&gt;c__DisplayClass3_1.&lt;BeginInvokeAction&gt;b__0(AsyncCallback asyncCallback, Object asyncState) +1082
   System.Web.Mvc.Async.WrappedAsyncResultBase`1.Begin(AsyncCallback callback, Object state, Int32 timeout) +163
   System.Web.Mvc.Async.AsyncControllerActionInvoker.BeginInvokeAction(ControllerContext controllerContext, String actionName, AsyncCallback callback, Object state) +463
   System.Web.Mvc.&lt;&gt;c.&lt;BeginExecuteCore&gt;b__152_0(AsyncCallback asyncCallback, Object asyncState, ExecuteCoreState innerState) +48
   System.Web.Mvc.Async.WrappedAsyncVoid`1.CallBeginDelegate(AsyncCallback callback, Object callbackState) +73
   System.Web.Mvc.Async.WrappedAsyncResultBase`1.Begin(AsyncCallback callback, Object state, Int32 timeout) +163
   System.Web.Mvc.Controller.BeginExecuteCore(AsyncCallback callback, Object state) +847
   System.Web.Mvc.Async.WrappedAsyncResultBase`1.Begin(AsyncCallback callback, Object state, Int32 timeout) +163
   System.Web.Mvc.Controller.BeginExecute(RequestContext requestContext, AsyncCallback callback, Object state) +630
   System.Web.Mvc.&lt;&gt;c.&lt;BeginProcessRequest&gt;b__20_0(AsyncCallback asyncCallback, Object asyncState, ProcessRequestState innerState) +99
   System.Web.Mvc.Async.WrappedAsyncVoid`1.CallBeginDelegate(AsyncCallback callback, Object callbackState) +73
   System.Web.Mvc.Async.WrappedAsyncResultBase`1.Begin(AsyncCallback callback, Object state, Int32 timeout) +163
   System.Web.Mvc.MvcHandler.BeginProcessRequest(HttpContextBase httpContext, AsyncCallback callback, Object state) +544
   System.Web.CallHandlerExecutionStep.System.Web.HttpApplication.IExecutionStep.Execute() +970
   System.Web.HttpApplication.ExecuteStepImpl(IExecutionStep step) +75
   System.Web.HttpApplication.ExecuteStep(IExecutionStep step, Boolean&amp; completedSynchronously) +158
</pre>                      </code>

                  </td>
               </tr>
            </table>

            <br>

            <hr width=100% size=1 color=silver>

            <b>Version Information:</b>&nbsp;Microsoft .NET Framework Version:4.0.30319; ASP.NET Version:4.8.4110.0

            </font>
          </div>
        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>