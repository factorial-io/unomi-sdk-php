<?php

namespace Nascom\TeamleaderApiClient;

use Nascom\TeamleaderApiClient\Http\ApiClient\ApiClientInterface;
use Nascom\TeamleaderApiClient\Repository\ActivityTypeRepository;
use Nascom\TeamleaderApiClient\Repository\BusinessTypeRepository;
use Nascom\TeamleaderApiClient\Repository\CalendarEventRepository;
use Nascom\TeamleaderApiClient\Repository\CompanyRepository;
use Nascom\TeamleaderApiClient\Repository\ContactRepository;
use Nascom\TeamleaderApiClient\Repository\CreditNoteRepository;
use Nascom\TeamleaderApiClient\Repository\CustomFieldDefinitionRepository;
use Nascom\TeamleaderApiClient\Repository\DealPhaseRepository;
use Nascom\TeamleaderApiClient\Repository\DealRepository;
use Nascom\TeamleaderApiClient\Repository\DealSourceRepository;
use Nascom\TeamleaderApiClient\Repository\DepartmentRepository;
use Nascom\TeamleaderApiClient\Repository\InvoiceRepository;
use Nascom\TeamleaderApiClient\Repository\LevelTwoAreaRepository;
use Nascom\TeamleaderApiClient\Repository\MilestoneRepository;
use Nascom\TeamleaderApiClient\Repository\PaymentTermRepository;
use Nascom\TeamleaderApiClient\Repository\ProductCategoryRepository;
use Nascom\TeamleaderApiClient\Repository\ProductRepository;
use Nascom\TeamleaderApiClient\Repository\ProjectRepository;
use Nascom\TeamleaderApiClient\Repository\QuotationRepository;
use Nascom\TeamleaderApiClient\Repository\TagRepository;
use Nascom\TeamleaderApiClient\Repository\TaxRateRepository;
use Nascom\TeamleaderApiClient\Repository\TimerRepository;
use Nascom\TeamleaderApiClient\Repository\TimeTrackingRepository;
use Nascom\TeamleaderApiClient\Repository\UserRepository;
use Nascom\TeamleaderApiClient\Repository\WebhookRepository;
use Nascom\TeamleaderApiClient\Repository\WithholdingTaxRateRepository;
use Nascom\TeamleaderApiClient\Repository\WorkOrderRepository;
use Nascom\TeamleaderApiClient\Repository\WorkTypeRepository;
use Nascom\TeamleaderApiClient\Serializer\SerializerFactory;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class Teamleader
 *
 * @package Nascom\TeamleaderApiClient
 */
class Teamleader
{
    /**
     * @var ApiClientInterface
     */
    private $apiClient;

    /**
     * @var SerializerInterface&NormalizerInterface
     */
    private $serializer;

    /**
     * Teamleader constructor.
     *
     * @param ApiClientInterface $apiClient
     * @param SerializerInterface&NormalizerInterface $serializer
     */
    public function __construct(
        ApiClientInterface $apiClient,
        SerializerInterface $serializer
    ) {
        $this->apiClient = $apiClient;
        $this->serializer = $serializer;
    }

    /**
     * @param ApiClientInterface $apiClient
     *
     * @return Teamleader
     */
    public static function withDefaultSerializer(ApiClientInterface $apiClient)
    {
        return new static($apiClient, SerializerFactory::create());
    }

    /**
     * @return DepartmentRepository
     */
    public function departments()
    {
        return new DepartmentRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return UserRepository
     */
    public function users()
    {
        return new UserRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return CustomFieldDefinitionRepository
     */
    public function customFieldDefinition()
    {
        return new CustomFieldDefinitionRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return WorkTypeRepository
     */
    public function workTypes()
    {
        return new WorkTypeRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return ContactRepository
     */
    public function contacts()
    {
        return new ContactRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return CompanyRepository
     */
    public function companies()
    {
        return new CompanyRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return BusinessTypeRepository
     */
    public function businessTypes()
    {
        return new BusinessTypeRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return TagRepository
     */
    public function tags()
    {
        return new TagRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return DealRepository
     */
    public function deals()
    {
        return new DealRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return DealPhaseRepository
     */
    public function dealPhases()
    {
        return new DealPhaseRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return DealSourceRepository
     */
    public function dealSources()
    {
        return new DealSourceRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return QuotationRepository
     */
    public function quotations()
    {
        return new QuotationRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return CalendarEventRepository
     */
    public function calendarEvents()
    {
        return new CalendarEventRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return ActivityTypeRepository
     */
    public function activityTypes()
    {
        return new ActivityTypeRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return InvoiceRepository
     */
    public function invoices()
    {
        return new InvoiceRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return CreditNoteRepository
     */
    public function creditNotes()
    {
        return new CreditNoteRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return PaymentTermRepository
     */
    public function paymentTerms()
    {
        return new PaymentTermRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return TaxRateRepository
     */
    public function taxRates()
    {
        return new TaxRateRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return WithholdingTaxRateRepository
     */
    public function withholdingTaxRates()
    {
        return new WithholdingTaxRateRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return ProductCategoryRepository
     */
    public function productCategories()
    {
        return new ProductCategoryRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return ProductRepository
     */
    public function products()
    {
        return new ProductRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return ProjectRepository
     */
    public function projects()
    {
        return new ProjectRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return MilestoneRepository
     */
    public function milestones()
    {
        return new MilestoneRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return TimeTrackingRepository
     */
    public function timeTracking()
    {
        return new TimeTrackingRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return TimerRepository
     */
    public function timers()
    {
        return new TimerRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return WebhookRepository
     */
    public function webhooks()
    {
        return new WebhookRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return LevelTwoAreaRepository
     */
    public function levelTwoAreas()
    {
        return new LevelTwoAreaRepository($this->apiClient, $this->serializer);
    }

    /**
     * @return WorkOrderRepository
     */
    public function workOrders()
    {
        return new WorkOrderRepository($this->apiClient, $this->serializer);
    }
}