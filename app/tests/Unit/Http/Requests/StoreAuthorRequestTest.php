<?php

declare(strict_types=1);

namespace Tests\Unit\Http\Requests;

use App\Http\Requests\StoreAuthorRequest;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Request;
use Tests\TestCase;

class StoreAuthorRequestTest extends TestCase
{
    private \Closure $storeRequest;

    protected function setUp(): void
    {
        parent::setUp();

        $this->storeRequest = function ($data) {
            $request = new Request(request: $data);
            $request->setMethod(Request::METHOD_POST);

            $storeRequest = StoreAuthorRequest::createFromBase($request);
            $storeRequest->setContainer($this->app);
            $storeRequest->setRedirector($this->app->get('redirect'));

            return $storeRequest;
        };
    }

    public function testItPassesValidation(): void
    {
        $data = ['name' => 'PHPUnit'];

        /** @var StoreAuthorRequest $storeRequest */
        $storeRequest = $this->storeRequest->call($this, $data);
        $storeRequest->validateResolved(); // Triggers the validation

        $this->assertNotEmpty($storeRequest->validated());
    }

    public function storeRequestDataProvider(): array
    {
        return [
            'wrong key name' => [['names' => 'PHPUnit']],
            'wrong value' => [['name' => 1]],
            'value too short' => [['name' => 'PH']],
            'empty value' => [['name' => null]],
            'no data' => [[]],
        ];
    }

    /**
     * @dataProvider storeRequestDataProvider
     */
    public function testItFailsValidation(array $data): void
    {
        $this->expectException(ValidationException::class);

        /** @var StoreAuthorRequest $storeRequest */
        $storeRequest = $this->storeRequest->call($this, $data);
        $storeRequest->validateResolved();
    }
}
