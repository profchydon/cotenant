<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotenant;
use App\Http\Repositories\CotenantRepository;

class CotenantController extends Controller
{

    /**
     * The Tenant
     *
     * @var object
     */
    private $cotenant;


    /**
     * Class constructor
     */
    public function __construct(CotenantRepository $cotenant)
    {
        // Inject CoTenantRepository Class into CoTenantController
        $this->cotenant = $cotenant;
    }

    /**
     * Create a  new Tenant
     *
     * @param object $request
     *
     * @return JSON
     *
     */
    public function create (Request $request)
    {
        try {

            // Call the create method of CoTenantRepository
            $cotenant = $this->cotenant->create($request);

            // Create a custom array as response
            $response = [
                "success" => true,
                "status" => 201,
                "data" => $cotenant
            ];

            // return the custom in JSON format
            return response()->json($response);

        } catch (\Exception $e) {

          // Create a custom response
          $response = [
              "success" => false,
              "status" => 502,
          ];

          // return the custom in JSON format
          return response()->json($response);

        }

    }


    /**
     * Fetch all existing Tenants
     *
     * @return JSON
     */
    public function cotenants ()
    {
      try {

        // Call the Tenants method of CoTenantRepository
        $cotenants = $this->cotenant->cotenants();

        // Create a custom response
        $response = [
            "success" => true,
            "status" => 200,
            "data" => $cotenants
        ];

        // return the custom in JSON format
        return response()->json($response);

      } catch (\Exception $e) {

        // Create a custom response
        $response = [
            "success" => false,
            "status" => 502,
        ];

        // return the custom in JSON format
        return response()->json($response);

      }

    }


    /**
     * Fetch a Tenant
     *
     * @param int $id
     *
     * @return JSON
     *
     */
    public function fetchACoTenant($id)
    {

        try {

          // Call the fetchACoTenant method of CoTenantRepository
          $cotenant = $this->cotenant->fetchACoTenant($id);

          // Check size of $tenant array to determine if there is a resource.
          if (sizeof($cotenant) == 0) {

              $cotenant = "No data found: Tenant does not exist";


          }

          // Create a custom response
          $response = [
              "success" => true,
              "status" => 200,
              "data" => $cotenant
          ];

          // return the custom in JSON format
          return response()->json($response);

        } catch (\Exception $e) {

          // Create a custom response
          $response = [
              "success" => false,
              "status" => 502,
          ];

          // return the custom in JSON format
          return response()->json($response);
        }

    }

    public function updateCoTenant($id , Request $request)
    {

      try {

        // Call the updateTenant method of TenantRepository
        $cotenant = $this->cotenant->updateCoTenant($id, $request);

        // Create a custom response
        $response = [
            "success" => true,
            "status" => 200,
            "data" => $cotenant
        ];

        // return the custom in JSON format
        return response()->json($response);

      } catch (\Exception $e) {

        // Create a custom response
        $response = [
            "success" => false,
            "status" => 502,
        ];

        // return the custom in JSON format
        return response()->json($response);
      }

    }

}

?>