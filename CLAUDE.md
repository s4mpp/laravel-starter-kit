<laravel-boost-guidelines>
=== foundation rules ===

# Laravel Boost Guidelines

The Laravel Boost guidelines are specifically curated by Laravel maintainers for this application. These guidelines should be followed closely to enhance the user's satisfaction building Laravel applications.

## Foundational Context
This application is a Laravel application and its main Laravel ecosystems package & versions are below. You are an expert with them all. Ensure you abide by these specific packages & versions.

- php - 8.3.30
- laravel/framework (LARAVEL) - v12
- laravel/prompts (PROMPTS) - v0
- larastan/larastan (LARASTAN) - v3
- laravel/mcp (MCP) - v0
- laravel/pint (PINT) - v1
- laravel/sail (SAIL) - v1
- laravel/telescope (TELESCOPE) - v5
- phpunit/phpunit (PHPUNIT) - v11
- rector/rector (RECTOR) - v2
- alpinejs (ALPINEJS) - v3
- tailwindcss (TAILWINDCSS) - v4

## Conventions
- You must follow all existing code conventions used in this application. When creating or editing a file, check sibling files for the correct structure, approach, and naming.
- Use descriptive names for variables and methods. For example, `isRegisteredForDiscounts`, not `discount()`.
- Check for existing components to reuse before writing a new one.

## Verification Scripts
- Do not create verification scripts or tinker when tests cover that functionality and prove it works. Unit and feature tests are more important.

## Application Structure & Architecture
- Stick to existing directory structure; don't create new base folders without approval.
- Do not change the application's dependencies without approval.

## Frontend Bundling
- If the user doesn't see a frontend change reflected in the UI, it could mean they need to run `npm run build`, `npm run dev`, or `composer run dev`. Ask them.

## Replies
- Be concise in your explanations - focus on what's important rather than explaining obvious details.

## Documentation Files
- You must only create documentation files if explicitly requested by the user.

=== boost rules ===

## Laravel Boost
- Laravel Boost is an MCP server that comes with powerful tools designed specifically for this application. Use them.

## Artisan
- Use the `list-artisan-commands` tool when you need to call an Artisan command to double-check the available parameters.

## URLs
- Whenever you share a project URL with the user, you should use the `get-absolute-url` tool to ensure you're using the correct scheme, domain/IP, and port.

## Tinker / Debugging
- You should use the `tinker` tool when you need to execute PHP to debug code or query Eloquent models directly.
- Use the `database-query` tool when you only need to read from the database.

## Reading Browser Logs With the `browser-logs` Tool
- You can read browser logs, errors, and exceptions using the `browser-logs` tool from Boost.
- Only recent browser logs will be useful - ignore old logs.

## Searching Documentation (Critically Important)
- Boost comes with a powerful `search-docs` tool you should use before any other approaches when dealing with Laravel or Laravel ecosystem packages. This tool automatically passes a list of installed packages and their versions to the remote Boost API, so it returns only version-specific documentation for the user's circumstance. You should pass an array of packages to filter on if you know you need docs for particular packages.
- The `search-docs` tool is perfect for all Laravel-related packages, including Laravel, Inertia, Livewire, Filament, Tailwind, Pest, Nova, Nightwatch, etc.
- You must use this tool to search for Laravel ecosystem documentation before falling back to other approaches.
- Search the documentation before making code changes to ensure we are taking the correct approach.
- Use multiple, broad, simple, topic-based queries to start. For example: `['rate limiting', 'routing rate limiting', 'routing']`.
- Do not add package names to queries; package information is already shared. For example, use `test resource table`, not `filament 4 test resource table`.

### Available Search Syntax
- You can and should pass multiple queries at once. The most relevant results will be returned first.

1. Simple Word Searches with auto-stemming - query=authentication - finds 'authenticate' and 'auth'.
2. Multiple Words (AND Logic) - query=rate limit - finds knowledge containing both "rate" AND "limit".
3. Quoted Phrases (Exact Position) - query="infinite scroll" - words must be adjacent and in that order.
4. Mixed Queries - query=middleware "rate limit" - "middleware" AND exact phrase "rate limit".
5. Multiple Queries - queries=["authentication", "middleware"] - ANY of these terms.

=== php rules ===

## PHP

- Always use curly braces for control structures, even if it has one line.

### Constructors
- Use PHP 8 constructor property promotion in `__construct()`.
    - <code-snippet>public function __construct(public GitHub $github) { }</code-snippet>
- Do not allow empty `__construct()` methods with zero parameters unless the constructor is private.

### Type Declarations
- Always use explicit return type declarations for methods and functions.
- Use appropriate PHP type hints for method parameters.

<code-snippet name="Explicit Return Types and Method Params" lang="php">
protected function isAccessible(User $user, ?string $path = null): bool
{
    ...
}
</code-snippet>

## Comments
- Prefer PHPDoc blocks over inline comments. Never use comments within the code itself unless there is something very complex going on.

## PHPDoc Blocks
- Add useful array shape type definitions for arrays when appropriate.

## Enums
- Typically, keys in an Enum should be TitleCase. For example: `FavoritePerson`, `BestLake`, `Monthly`.

=== laravel/core rules ===

## Do Things the Laravel Way

- Use `php artisan make:` commands to create new files (i.e. migrations, controllers, models, etc.). You can list available Artisan commands using the `list-artisan-commands` tool.
- If you're creating a generic PHP class, use `php artisan make:class`.
- Pass `--no-interaction` to all Artisan commands to ensure they work without user input. You should also pass the correct `--options` to ensure correct behavior.

### Database
- Always use proper Eloquent relationship methods with return type hints. Prefer relationship methods over raw queries or manual joins.
- Use Eloquent models and relationships before suggesting raw database queries.
- Avoid `DB::`; prefer `Model::query()`. Generate code that leverages Laravel's ORM capabilities rather than bypassing them.
- Generate code that prevents N+1 query problems by using eager loading.
- Use Laravel's query builder for very complex database operations.

### Model Creation
- When creating new models, create useful factories and seeders for them too. Ask the user if they need any other things, using `list-artisan-commands` to check the available options to `php artisan make:model`.

### APIs & Eloquent Resources
- For APIs, default to using Eloquent API Resources and API versioning unless existing API routes do not, then you should follow existing application convention.

### Controllers & Validation
- Always create Form Request classes for validation rather than inline validation in controllers. Include both validation rules and custom error messages.
- Check sibling Form Requests to see if the application uses array or string based validation rules.

### Queues
- Use queued jobs for time-consuming operations with the `ShouldQueue` interface.

### Authentication & Authorization
- Use Laravel's built-in authentication and authorization features (gates, policies, Sanctum, etc.).

### URL Generation
- When generating links to other pages, prefer named routes and the `route()` function.

### Configuration
- Use environment variables only in configuration files - never use the `env()` function directly outside of config files. Always use `config('app.name')`, not `env('APP_NAME')`.

### Testing
- When creating models for tests, use the factories for the models. Check if the factory has custom states that can be used before manually setting up the model.
- Faker: Use methods such as `$this->faker->word()` or `fake()->randomDigit()`. Follow existing conventions whether to use `$this->faker` or `fake()`.
- When creating tests, make use of `php artisan make:test [options] {name}` to create a feature test, and pass `--unit` to create a unit test. Most tests should be feature tests.

### Vite Error
- If you receive an "Illuminate\Foundation\ViteException: Unable to locate file in Vite manifest" error, you can run `npm run build` or ask the user to run `npm run dev` or `composer run dev`.

=== laravel/v12 rules ===

## Laravel 12

- Use the `search-docs` tool to get version-specific documentation.
- Since Laravel 11, Laravel has a new streamlined file structure which this project uses.

### Laravel 12 Structure
- In Laravel 12, middleware are no longer registered in `app/Http/Kernel.php`.
- Middleware are configured declaratively in `bootstrap/app.php` using `Application::configure()->withMiddleware()`.
- `bootstrap/app.php` is the file to register middleware, exceptions, and routing files.
- `bootstrap/providers.php` contains application specific service providers.
- The `app\Console\Kernel.php` file no longer exists; use `bootstrap/app.php` or `routes/console.php` for console configuration.
- Console commands in `app/Console/Commands/` are automatically available and do not require manual registration.

### Database
- When modifying a column, the migration must include all of the attributes that were previously defined on the column. Otherwise, they will be dropped and lost.
- Laravel 12 allows limiting eagerly loaded records natively, without external packages: `$query->latest()->limit(10);`.

### Models
- Casts can and likely should be set in a `casts()` method on a model rather than the `$casts` property. Follow existing conventions from other models.

=== pint/core rules ===

## Laravel Pint Code Formatter

- You must run `vendor/bin/pint --dirty --format agent` before finalizing changes to ensure your code matches the project's expected style.
- Do not run `vendor/bin/pint --test --format agent`, simply run `vendor/bin/pint --format agent` to fix any formatting issues.

=== phpunit/core rules ===

## PHPUnit

- This application uses PHPUnit for testing. All tests must be written as PHPUnit classes. Use `php artisan make:test --phpunit {name}` to create a new test.
- If you see a test using "Pest", convert it to PHPUnit.
- Every time a test has been updated, run that singular test.
- When the tests relating to your feature are passing, ask the user if they would like to also run the entire test suite to make sure everything is still passing.
- Tests should test all of the happy paths, failure paths, and weird paths.
- You must not remove any tests or test files from the tests directory without approval. These are not temporary or helper files; these are core to the application.

### Running Tests
- Run the minimal number of tests, using an appropriate filter, before finalizing.
- To run all tests: `php artisan test --compact`.
- To run all tests in a file: `php artisan test --compact tests/Feature/ExampleTest.php`.
- To filter on a particular test name: `php artisan test --compact --filter=testName` (recommended after making a change to a related file).

=== tailwindcss/core rules ===

## Tailwind CSS

- Use Tailwind CSS classes to style HTML; check and use existing Tailwind conventions within the project before writing your own.
- Offer to extract repeated patterns into components that match the project's conventions (i.e. Blade, JSX, Vue, etc.).
- Think through class placement, order, priority, and defaults. Remove redundant classes, add classes to parent or child carefully to limit repetition, and group elements logically.
- You can use the `search-docs` tool to get exact examples from the official documentation when needed.

### Spacing
- When listing items, use gap utilities for spacing; don't use margins.

<code-snippet name="Valid Flex Gap Spacing Example" lang="html">
    <div class="flex gap-8">
        <div>Superior</div>
        <div>Michigan</div>
        <div>Erie</div>
    </div>
</code-snippet>

### Dark Mode
- If existing pages and components support dark mode, new pages and components must support dark mode in a similar way, typically using `dark:`.

=== tailwindcss/v4 rules ===

## Tailwind CSS 4

- Always use Tailwind CSS v4; do not use the deprecated utilities.
- `corePlugins` is not supported in Tailwind v4.
- In Tailwind v4, configuration is CSS-first using the `@theme` directive — no separate `tailwind.config.js` file is needed.

<code-snippet name="Extending Theme in CSS" lang="css">
@theme {
  --color-brand: oklch(0.72 0.11 178);
}
</code-snippet>

- In Tailwind v4, you import Tailwind using a regular CSS `@import` statement, not using the `@tailwind` directives used in v3:

<code-snippet name="Tailwind v4 Import Tailwind Diff" lang="diff">
   - @tailwind base;
   - @tailwind components;
   - @tailwind utilities;
   + @import "tailwindcss";
</code-snippet>

### Replaced Utilities
- Tailwind v4 removed deprecated utilities. Do not use the deprecated option; use the replacement.
- Opacity values are still numeric.

| Deprecated |	Replacement |
|------------+--------------|
| bg-opacity-* | bg-black/* |
| text-opacity-* | text-black/* |
| border-opacity-* | border-black/* |
| divide-opacity-* | divide-black/* |
| ring-opacity-* | ring-black/* |
| placeholder-opacity-* | placeholder-black/* |
| flex-shrink-* | shrink-* |
| flex-grow-* | grow-* |
| overflow-ellipsis | text-ellipsis |
| decoration-slice | box-decoration-slice |
| decoration-clone | box-decoration-clone |

=== s4mpp/backline rules ===

## s4mpp/backline

This package provides a full-featured admin panel (CRUD, authentication, custom actions, reports, widgets, pages, extensions) for Laravel applications using a declarative builder pattern.

### File Structure

- Resources: `app/Backline/Resources/{Name}Resource.php` — auto-discovered
- Extensions: `app/Backline/Extensions/{Name}Extension.php` — auto-discovered
- CustomActions: `app/Backline/CustomActions/{Name}.php`
- Reports: `app/Backline/Reports/{Name}Report.php`
- Widgets: `app/Backline/Widgets/{Name}Widget.php`
- Pages: `app/Backline/Pages/{Name}Page.php`
- Section is derived from namespace: `Resources/Config/UserResource` → section "Config"
- Route names: `backline.resource.{slug}.action.{action}` (actions: `index`, `create`, `read`, `update`, `delete`)
- Route slugs are in Portuguese: `cadastrar`, `visualizar`, `editar`, `excluir`, `relatorio`, `pagina`, `acao`

### Registering Extensions and Configuring Backline

Resources and auto-discovered extensions (inside `app/Backline/`) do NOT need manual registration. Use the service provider only for optional configuration and external extensions:

<code-snippet name="Configure Backline in AppServiceProvider" lang="php">
use S4mpp\Backline\Backline;
use App\ExternalPackage\SomeExtension;

public function register(): void
{
    // Translate a section name (derived from namespace) to a human-readable label
    Backline::registerSection('Config', 'Configurações');

    // Register an extension that lives outside app/Backline/ (e.g. a third-party package)
    Backline::registerExtension(SomeExtension::class);

    // Enable is_active check: users with is_active != 1 get 403
    Backline::checkUserActive(true);

    // Enable two-factor authentication
    Backline::enable2FA(true);
}
</code-snippet>

### Creating a Resource

All builder methods (`form`, `table`, `read`, `filters`, `customActions`, `reports`, `widgets`, `pages`) are **instance methods**, not static.

<code-snippet name="Create a Backline Resource" lang="php">
<?php

namespace App\Backline\Resources;

use S4mpp\Backline\Builders\FormBuilder;
use S4mpp\Backline\Builders\ReadBuilder;
use S4mpp\Backline\Builders\TableBuilder;
use S4mpp\Backline\Concerns\Resource;
use S4mpp\Backline\Enums\Action;
use S4mpp\Backline\Form\Input;
use S4mpp\Backline\Form\Select;
use S4mpp\Backline\Form\Textarea;
use S4mpp\Backline\Labels\Text;
use S4mpp\Backline\Labels\Badge;
use App\Models\MyModel;

class MyModelResource extends Resource
{
    protected static string $title = 'My Models';
    protected static string $icon = 'cube';
    protected static int $menu_order = 1;
    protected static array $actions = [
        Action::Create,
        Action::Read,
        Action::Update,
        Action::Delete,
    ];

    // Optional: show a badge count in the menu item
    public static function badge(): int|float|string|null
    {
        return MyModel::where('active', false)->count() ?: null;
    }

    public function table(TableBuilder $table): void
    {
        $table->searchBy('Name', 'name');
        $table->sortBy('name')->asc();

        $table->columns(
            new Text('Name', 'name'),
            (new Badge('Status', 'status'))->fromEnum(StatusEnum::class, 'label', 'color'),
        );
    }

    public function read(ReadBuilder $read): void
    {
        $read->group('Details')->labels(
            new Text('Name', 'name'),
            new Text('Description', 'description'),
        );
    }

    public function form(FormBuilder $form): void
    {
        $form->group('Basic Info')->fields(
            new Input('Name', 'name'),
            (new Textarea('Description', 'description'))->optional(),
            (new Select('Status', 'status'))->fromEnum(StatusEnum::class, 'label'),
        );

        // Conditional fields (isCreating or isUpdating)
        if ($form->isCreating()) {
            $form->group('Security')->fields(
                (new Input('Password', 'password'))->password(),
            );
        }
    }
}
</code-snippet>

### Form Fields

<code-snippet name="All available Backline form fields" lang="php">
use S4mpp\Backline\Form\Input;
use S4mpp\Backline\Form\Textarea;
use S4mpp\Backline\Form\Select;
use S4mpp\Backline\Form\Radio;
use S4mpp\Backline\Form\Checkbox;
use S4mpp\Backline\Form\File;
use S4mpp\Backline\Form\Currency;
use S4mpp\Backline\Form\Search;

// Input - text, email, url, password, date, datetime, number
new Input('Name', 'name')
(new Input('Email', 'email'))->email()->unique()
(new Input('Website', 'url'))->url()->optional()
(new Input('Password', 'password'))->password()
(new Input('Birthday', 'birthday'))->date()
(new Input('Appointment', 'appointment'))->datetime()
(new Input('Score', 'score'))->number(min: 0, max: 100, step: 1)

// Textarea
(new Textarea('Notes', 'notes'))->rows(5)->optional()

// Select - from enum, model query, or static array
(new Select('Status', 'status'))->fromEnum(StatusEnum::class, 'label')
(new Select('Type', 'type'))->source(fn() => ['a' => 'Option A', 'b' => 'Option B'])
(new Select('Category', 'category_id'))->source(fn() => Category::pluck('name', 'id')->toArray())
    ->key(fn($item, $key) => $key)
    ->value(fn($item, $key) => $item)

// Radio
(new Radio('Active', 'active'))->boolean()  // Yes/No
(new Radio('Role', 'role'))->fromEnum(RoleEnum::class, 'label')->inline()

// Checkbox (multi-select stored as array)
(new Checkbox('Tags', 'tags'))->source(fn() => [1 => 'A', 2 => 'B'])->inline()->optional()
(new Checkbox('Items', 'items'))->fromEnum(ItemEnum::class)->optional()

// File upload
(new File('Avatar', 'avatar'))->folder('avatars')->public()->disk('public')->optional()
(new File('Document', 'file'))->disk('s3')->maxSize(5) // 5MB

// Currency (stored as decimal or as cents)
new Currency('Price', 'price')
(new Currency('Amount', 'amount'))->convertCents()  // stores/reads as integer cents

// Search (autocomplete)
new Search('Product', 'product_id')

// Common chainable methods on all fields
(new Input('Code', 'code'))
    ->optional()                          // make nullable
    ->addRule('min:3', 'max:100')         // add validation rules
    ->unique(fn($q) => $q->where('active', 1))  // unique with constraint
    ->default('N/A')                      // default value
    ->prepare(
        get: fn($v) => strtoupper($v),   // Model → Form
        set: fn($v) => strtolower($v)    // Form → Model
    )
</code-snippet>

### Labels (Table Columns & Read View)

<code-snippet name="All available Backline labels" lang="php">
use S4mpp\Backline\Labels\Text;
use S4mpp\Backline\Labels\Boolean;
use S4mpp\Backline\Labels\Badge;
use S4mpp\Backline\Labels\Currency;
use S4mpp\Backline\Labels\Image;
use S4mpp\Backline\Labels\Markdown;
use S4mpp\Backline\Labels\Number;
use S4mpp\Backline\Labels\Time;

// Text - plain string display
(new Text('Name', 'name'))->sortable()
(new Text('Email', 'email'))->link(fn($r) => 'mailto:'.$r->email)
(new Text('Status', 'status'))->callback(fn($v) => strtoupper($v))
(new Text('Nested', 'category.name'))->default('—')  // dot-notation for relationships

// Boolean - displays "Sim" / "Não"
new Boolean('Active', 'is_active')

// Badge - colored chip; use fromEnum() for enum-backed badges
(new Badge('Status', 'status'))
    ->content(fn($v) => $v->label())
    ->color(fn($v) => $v->color())
Badge::fromEnum('Status', 'status', method_label: 'label', method_color: 'color')

// Currency
new Currency('Price', 'price')
new Currency('Amount', 'amount', convert_cents: true)  // reads as integer cents

// Image
(new Image('Photo', 'photo'))->disk('public')

// Markdown - renders markdown as HTML
new Markdown('Body', 'body')
(new Markdown('Items'))->callback(fn($v, $register) => $register->items->map(fn($i) => '- '.$i->name)->implode("\n"))

// Number - numeric display with optional sum in table footer
(new Number('Qty', 'quantity'))->sum()

// Time - date/datetime formatting
new Time('Created At', 'created_at')                   // default: d/m/Y H:i
(new Time('Date', 'date'))->date()                     // d/m/Y
(new Time('Hour', 'time'))->time()                     // H:i
(new Time('Published', 'published_at'))->format('d.m.Y H:i:s')

// Common chainable methods on all labels
(new Text('Title', 'title'))
    ->sortable()                                        // enable column sort
    ->default('—')                                      // fallback if null
    ->callback(fn($value, $record) => mb_strtoupper($value))
    ->link(fn($record) => route('show', $record->id), new_tab: true)
    ->details(fn($record) => $record->extra_info)
</code-snippet>

### Repeaters (Nested Relationships)

<code-snippet name="Backline Repeater for nested relationships" lang="php">
use S4mpp\Backline\Support\Repeater;
use S4mpp\Backline\Form\Input;
use S4mpp\Backline\Form\Select;
use S4mpp\Backline\Labels\Text;

// In form() — use ->fields() — supports HasMany and BelongsToMany
public function form(FormBuilder $form): void
{
    // HasMany
    $form->repeater((new Repeater('Sub Items', 'subItems'))->fields(
        new Input('Name', 'name'),
        (new Select('Type', 'type'))->fromEnum(TypeEnum::class, 'label'),
    ));

    // BelongsToMany (pivot columns are also fields)
    $form->repeater((new Repeater('Tags', 'tags'))->fields(
        (new Select('Tag', 'tag_id'))->source(fn() => Tag::pluck('name', 'id')->toArray()),
        (new Input('Order', 'order'))->number()->optional(),
    ));
}

// In read() — use ->labels()
public function read(ReadBuilder $read): void
{
    $read->repeater((new Repeater('Sub Items', 'subItems'))->labels(
        new Text('Name', 'name'),
        new Text('Type', 'type'),
    ));
}
</code-snippet>

### Filters

<code-snippet name="Backline filters for the index listing" lang="php">
use S4mpp\Backline\Filters\Period;
use S4mpp\Backline\Filters\Multiple;

public function filters(FilterBuilder $filter): void
{
    $filter->add(
        // Period filter — date range on a field
        (new Period('Created at', 'created_at'))
            ->default(now()->subMonth()->format('Y-m-d H:i'), now()->format('Y-m-d H:i')),

        // Period on a related model's field
        (new Period('Category created at', 'created_at'))
            ->relationship('category', 'created_at'),

        // Multiple filter — whereIn from a static source
        (new Multiple('Status', 'status'))->source(fn(): array => [
            'active'   => 'Active',
            'inactive' => 'Inactive',
        ]),

        // Multiple on a relationship
        (new Multiple('Category', 'id'))
            ->relationship('category', 'id')
            ->source(fn(): array => Category::pluck('name', 'id')->toArray()),
    );
}
</code-snippet>

### Custom Actions

Custom actions appear as buttons on the read/detail view and optionally support bulk execution from the listing.

<code-snippet name="Create a Backline CustomAction" lang="php">
<?php

namespace App\Backline\CustomActions;

use Exception;
use Illuminate\Database\Eloquent\Model;
use S4mpp\Backline\Concerns\CustomAction;

// Simple action with danger confirmation
class DeactivateRecord extends CustomAction
{
    protected static ?string $title = 'Deactivate';
    protected bool|string $confirmation = 'Are you sure you want to deactivate this record?';
    protected bool $danger = true;
    protected bool $bulk_actions = true; // also shown on bulk selection (default: true)

    public function handle(Model $register): void
    {
        $register->update(['active' => false]);
    }
}

// Conditional action — throws Exception to block execution
class ConditionalAction extends CustomAction
{
    protected static ?string $title = 'Activate';

    // Called before handle(); throw Exception to block with an error message
    public function validation(Model $register): void
    {
        if ($register->active === true) {
            throw new Exception('Record is already active');
        }
    }

    public function handle(Model $register): void
    {
        $register->update(['active' => true]);
    }
}
</code-snippet>

Register custom actions in the resource:

<code-snippet name="Register CustomActions in a Resource" lang="php">
use S4mpp\Backline\Builders\CustomActionBuilder;
use App\Backline\CustomActions\DeactivateRecord;
use App\Backline\CustomActions\ConditionalAction;

public function customActions(CustomActionBuilder $custom_action_builder): void
{
    $custom_action_builder->add(
        new DeactivateRecord,
        new ConditionalAction,
    );
}
</code-snippet>

### Reports

Reports display a read-only table with optional filters, accessible from the resource.

<code-snippet name="Create a Backline Report" lang="php">
<?php

namespace App\Backline\Reports;

use Illuminate\Database\Eloquent\Builder;
use S4mpp\Backline\Builders\TableBuilder;
use S4mpp\Backline\Concerns\Report;
use S4mpp\Backline\Labels\Text;
use S4mpp\Backline\Labels\Boolean;
use S4mpp\Backline\Labels\Time;
use App\Models\MyModel;

class MyModelReport extends Report
{
    protected static ?string $title = 'All Records';
    protected static ?string $description = 'Full listing with relationships.';

    public function query(): Builder
    {
        return MyModel::query()->with('category');
    }

    public function table(TableBuilder $table_builder): void
    {
        $table_builder->columns(
            new Text('ID', 'id'),
            new Text('Name', 'name'),
            (new Text('Category', 'category.name'))->default('—'),
            new Boolean('Active', 'active'),
            new Time('Created at', 'created_at'),
        );
    }
}
</code-snippet>

Register reports in the resource:

<code-snippet name="Register Reports in a Resource" lang="php">
use S4mpp\Backline\Builders\ReportBuilder;
use App\Backline\Reports\MyModelReport;

public function reports(ReportBuilder $report_builder): void
{
    $report_builder->add(new MyModelReport);
}
</code-snippet>

### Widgets

Widgets appear on the dashboard home page. Each widget renders a Blade view with data.

<code-snippet name="Create a Backline Widget" lang="php">
<?php

namespace App\Backline\Widgets;

use S4mpp\Backline\Concerns\Widget;
use App\Models\MyModel;

class TotalRecordsWidget extends Widget
{
    protected static ?string $title = 'Total Records';
    protected static ?string $source = 'widgets.total-records'; // Blade view name

    public function data(): array
    {
        return [
            'total' => MyModel::count(),
        ];
    }
}
</code-snippet>

Register widgets in the resource:

<code-snippet name="Register Widgets in a Resource" lang="php">
use S4mpp\Backline\Builders\WidgetBuilder;
use App\Backline\Widgets\TotalRecordsWidget;

public function widgets(WidgetBuilder $widget_builder): void
{
    $widget_builder->add(new TotalRecordsWidget);
}
</code-snippet>

### Pages

Pages are custom Blade views accessible as a tab within a resource.

<code-snippet name="Create a Backline Page" lang="php">
<?php

namespace App\Backline\Pages;

use S4mpp\Backline\Concerns\Page;

class StatisticsPage extends Page
{
    protected static ?string $title = 'Statistics';
    protected static ?string $source = 'my-resource.statistics'; // Blade view name
}
</code-snippet>

Register pages in the resource:

<code-snippet name="Register Pages in a Resource" lang="php">
use S4mpp\Backline\Builders\PageBuilder;
use App\Backline\Pages\StatisticsPage;

public function pages(PageBuilder $page_builder): void
{
    $page_builder->add(new StatisticsPage);
}
</code-snippet>

### Extensions (Custom Routes & Header Buttons)

Extensions are auto-discovered from `app/Backline/Extensions/`. All methods are **instance methods**.

<code-snippet name="Create a Backline Extension" lang="php">
<?php

namespace App\Backline\Extensions;

use Illuminate\Support\Facades\Route;
use S4mpp\Backline\Builders\ExtensionBuilder;
use S4mpp\Backline\Concerns\Extension;

class MyExtension extends Extension
{
    // headerButton($icon, $title, $route_name, $new_tab = false)
    // $route_name resolves to backline.extension.{route_name}
    public function headerButtons(ExtensionBuilder $extension): void
    {
        $extension->headerButton('arrow-down-tray', 'Export CSV', 'my-export');

        // Add to user dropdown instead of header
        $extension->userButton('cog', 'Settings', 'my-settings');
    }

    public function routes(ExtensionBuilder $extension): void
    {
        $extension->route(function () {
            Route::get('export', [MyController::class, 'export'])->name('my-export');
            Route::get('settings', [MyController::class, 'settings'])->name('my-settings');
        });
    }

    // Optional: return event listeners as [EventClass => ListenerClass]
    public function listeners(): array
    {
        return [];
    }
}
</code-snippet>

### Additional Configuration

<code-snippet name="All available Backline config options in config/backline.php" lang="php">
<?php

return [
    // Auth guard used to protect the admin panel (default: 'web')
    'guard' => 'web',

    // URL prefix for all Backline routes (default: 'backline')
    'prefix' => 'backline',

    // Optional subdomain for the admin panel (default: null)
    'domain' => 'admin.example.com',

    // Additional middleware applied to all Backline routes
    'middlewares' => [
        \App\Http\Middleware\EnsureEmailIsVerified::class,
    ],

    // Base path where Resources/ and Extensions/ directories are located
    // (default: app_path('Backline'), i.e. app/Backline)
    'resources_path' => app_path('Backline'),

    // Root namespace for Resources and Extensions classes (default: 'App')
    'app_namespace' => 'App',

    // Override the main layout view (default: 'backline::layout.main')
    'layout' => [
        'main' => 'backline::layout.main',
    ],

    // Vite entry points to inject custom CSS/JS into the admin panel
    'vite' => [
        'css' => 'resources/css/backline.css',
        'js'  => 'resources/js/backline.js',
    ],

    // If true, users with is_active != 1 are denied access (403)
    'check_user_active' => false,
];
</code-snippet>

### Getting Current Resource and Action

<code-snippet name="Get the current Backline resource and action from anywhere" lang="php">
use S4mpp\Backline\Backline;

// Returns the resource slug for the current route, or null
$resource = Backline::currentResource(); // e.g. 'my-models'

// Returns the action name string for the current route, or null
$action = Backline::currentAction(); // e.g. 'index', 'create', 'read', 'update', 'delete'

// Returns the extension slug for the current route, or null
$extension = Backline::currentExtension();
</code-snippet>

### Testing with InteractsWithBackline

<code-snippet name="Testing Backline resources with InteractsWithBackline" lang="php">
<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\MyModel;
use App\Backline\Resources\MyModelResource;
use S4mpp\Backline\Test\InteractsWithBackline;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MyModelResourceTest extends TestCase
{
    use RefreshDatabase, InteractsWithBackline;

    public function test_index_page(): void
    {
        $user = User::factory()->create();

        $response = $this->resource(new MyModelResource)->as($user)->index();

        $response->assertOk();
    }

    public function test_create_and_save(): void
    {
        $user = User::factory()->create();
        $resource = $this->resource(new MyModelResource)->as($user);

        $resource->create()->assertOk();

        $resource->save(['name' => 'Test', 'status' => 'active'])->assertRedirect();
    }

    public function test_read_page(): void
    {
        $user = User::factory()->create();
        $record = MyModel::factory()->create();

        $response = $this->resource(new MyModelResource)->as($user)->read($record->id);

        $response->assertOk();
        $response->assertSee($record->name);
    }

    public function test_update(): void
    {
        $user = User::factory()->create();
        $record = MyModel::factory()->create();
        $resource = $this->resource(new MyModelResource)->as($user);

        $resource->edit($record->id)->assertOk();

        $resource->update($record->id, ['name' => 'Updated'])->assertRedirect();
    }

    public function test_delete(): void
    {
        $user = User::factory()->create();
        $record = MyModel::factory()->create();

        $this->resource(new MyModelResource)->as($user)->delete($record->id)->assertRedirect();

        $this->assertDatabaseMissing('my_models', ['id' => $record->id]);
    }
}
</code-snippet>

The `resource()` method returns a fluent `TestResource` with these methods:
- `->as(User $user)` — authenticate as the given user
- `->index()` — GET the listing page
- `->create()` — GET the create form
- `->save(array $data)` — POST to create (submits the form)
- `->read(int $id)` — GET the detail/read page
- `->edit(int $id)` — GET the update form
- `->update(int $id, array $data)` — PUT to update
- `->delete(int $id)` — DELETE a record

### Available Actions

<code-snippet name="Backline Action enum values" lang="php">
use S4mpp\Backline\Enums\Action;

// Use in $actions property of a Resource to control which operations are available
protected static array $actions = [
    Action::Create,
    Action::Read,
    Action::Update,
    Action::Delete,
    Action::Duplicate,  // Adds a "duplicate" button in the read/list view
];

// Check inside form() or other methods
if ($form->isCreating()) { /* only on create */ }
if ($form->isUpdating()) { /* only on update */ }
</code-snippet>

=== s4mpp/blix-ui rules ===

## Blix UI

Blix UI is a simple and reusable Blade component library for Laravel. All components use the `x-blix::` namespace and are styled with Tailwind CSS. All components accept a `size` prop (xs, sm, md, lg, xl — default: md).

### UI Components

- **Button**: A styled button element.
- **Link**: A styled anchor element.
- **Alert**: A notification banner with type variants (error, success, warning, info).
- **Dropdown**: A dropdown container with named slots `action` (trigger) and `menu` (content). Supports `alignment` prop (left/right).

<code-snippet name="Button" lang="blade">
<x-blix::ui.button class="bg-blue-600 text-white" size="md">
    Save
</x-blix::ui.button>
</code-snippet>

<code-snippet name="Link" lang="blade">
<x-blix::ui.link href="/dashboard" class="bg-gray-200 text-gray-800" size="lg">
    Go to Dashboard
</x-blix::ui.link>
</code-snippet>

<code-snippet name="Alert variants" lang="blade">
<x-blix::ui.alert type="success">Operation completed.</x-blix::ui.alert>
<x-blix::ui.alert type="error">Something went wrong.</x-blix::ui.alert>
<x-blix::ui.alert type="warning">Please review your input.</x-blix::ui.alert>
<x-blix::ui.alert type="info">New version available.</x-blix::ui.alert>
</code-snippet>

<code-snippet name="Dropdown" lang="blade">
<x-blix::ui.dropdown alignment="right">
    <x-slot:action>
        <x-blix::ui.button class="bg-blue-600 text-white">Options</x-blix::ui.button>
    </x-slot:action>
    <x-slot:menu class="bg-white rounded shadow-lg">
        <a href="/profile" class="block px-4 py-2">Profile</a>
        <a href="/settings" class="block px-4 py-2">Settings</a>
    </x-slot:menu>
</x-blix::ui.dropdown>
</code-snippet>

### Form Components

- **Input**: A text input with optional label.
- **Textarea**: A textarea with optional label.
- **Select**: A select dropdown with optional label. Pass options as slot content.
- **Checkbox**: A checkbox with optional inline label. Accepts `checked` prop.
- **Radio**: A radio button with optional inline label. Accepts `checked` prop.
- **Label**: A standalone label element.

All form components accept `label` for the label text, `required` to mark as required, and `size` for sizing.

<code-snippet name="Text input with label" lang="blade">
<x-blix::form.input label="Email" type="email" name="email" required />
</code-snippet>

<code-snippet name="Textarea" lang="blade">
<x-blix::form.textarea label="Description" name="description" rows="4">
    Default content here
</x-blix::form.textarea>
</code-snippet>

<code-snippet name="Select dropdown" lang="blade">
<x-blix::form.select label="Country" name="country" required>
    <option value="">Select...</option>
    <option value="br">Brazil</option>
    <option value="us">United States</option>
</x-blix::form.select>
</code-snippet>

<code-snippet name="Checkbox with label" lang="blade">
<x-blix::form.checkbox name="terms" label="I agree to the terms" />
<x-blix::form.checkbox name="active" checked>Active</x-blix::form.checkbox>
</code-snippet>

<code-snippet name="Radio buttons" lang="blade">
<x-blix::form.radio name="plan" value="free" label="Free" />
<x-blix::form.radio name="plan" value="pro" checked>Pro</x-blix::form.radio>
</code-snippet>

### Conventions

- All components use the `x-blix::` prefix.
- Components are organized in two groups: `ui` (Button, Link, Alert, Dropdown) and `form` (Input, Textarea, Select, Checkbox, Radio, Label).
- All components accept a `size` prop: `xs`, `sm`, `md` (default), `lg`, `xl`.
- Extra HTML attributes are forwarded to the underlying element via `$attributes`.
- Tailwind CSS classes can be added directly via the `class` attribute.
- No Alpine.js — components are pure server-rendered Blade, no JS dependencies.

=== s4mpp/laravel-auth-suite rules ===

## Laravel Auth Suite

`s4mpp/laravel-auth-suite` provides reusable authentication service classes for Laravel applications: login, logout, password checking, and password reset. It does **not** provide routes, controllers, or publishable views — the consuming application defines those.

### Architecture

The package exposes four service classes that controllers instantiate and call directly. All classes are in the `S4mpp\LaravelAuthSuite` namespace.

### Form Requests

Use the bundled Form Requests for input validation:

- `AuthRequest` — validates `username` (required, string), `password` (required, string), and `remember` (nullable, boolean).
- `SendRecoveryPasswordEmailRequest` — validates `email` (required, email format).
- `StoreNewPasswordRequest` — validates `email`, `token`, `password` (min 5 chars, confirmed), and `password_confirmation`.

### Login

Instantiate `Login` with the user model and the guard name. Call `try(string $password, bool $remember = false): bool` to verify the password and authenticate the user. Pass `true` as the second argument to enable "remember me" persistence.

<code-snippet name="Login flow" lang="php">
use S4mpp\LaravelAuthSuite\Login;
use S4mpp\LaravelAuthSuite\Requests\AuthRequest;

public function auth(AuthRequest $request)
{
    $user = User::where('email', $request->get('username'))->first();

    if (! $user) {
        return redirect()->back()->withErrors('Usuário não encontrado');
    }

    $login = new Login($user, 'web');

    if (! $login->try($request->get('password'), (bool) $request->get('remember'))) {
        return redirect()->back()->withErrors('Usuário ou senha inválidos');
    }

    return to_route('home');
}
</code-snippet>

### Logout

Instantiate `Logout` with the guard name. Call `handle(): void` to log out and regenerate the CSRF token.

<code-snippet name="Logout flow" lang="php">
use S4mpp\LaravelAuthSuite\Logout;

public function logout()
{
    (new Logout('web'))->handle();

    return to_route('login');
}
</code-snippet>

### Password Check

`Password` checks a plain-text value against a stored hash. It also supports a master password configured at `auth.master_password`.

<code-snippet name="Password check" lang="php">
use S4mpp\LaravelAuthSuite\Password;

$check = (new Password($user->password))->check($plainText); // bool
</code-snippet>

### Password Reset — Send Link

Instantiate `PasswordReset` with the user model and guard name. Call `sendLink(string $route): mixed`, passing the named route that handles the reset form (must accept `token` and `email` parameters). The package sends a `PasswordResetMail` automatically.

<code-snippet name="Send password reset link" lang="php">
use S4mpp\LaravelAuthSuite\PasswordReset;
use S4mpp\LaravelAuthSuite\Requests\SendRecoveryPasswordEmailRequest;

public function sendRecoveryPassword(SendRecoveryPasswordEmailRequest $request)
{
    $user = User::where('email', $request->get('email'))->first();

    if (! $user) {
        return redirect()->back()->withErrors('Conta não encontrada');
    }

    $status = (new PasswordReset($user, 'web'))->sendLink('create_new_password');

    if (! is_string($status)) {
        return redirect()->back()->withErrors('Falha ao enviar o e-mail');
    }

    return redirect()->back()->with('message', __($status));
}
</code-snippet>

### Password Reset — Validate Token & Reset

Use the static `getResetUserByToken(string $token, string $email, string $guard): bool|CanResetPassword` to validate a token before showing the reset form. Then call `reset(string $token, string $new_password): mixed` to apply the new password.

<code-snippet name="Validate token and reset password" lang="php">
use S4mpp\LaravelAuthSuite\PasswordReset;
use S4mpp\LaravelAuthSuite\Requests\StoreNewPasswordRequest;

// Show reset form — validate token first
public function createNewPassword(Request $request, string $token)
{
    $user = PasswordReset::getResetUserByToken($token, $request->get('email'), 'web');

    if (! $user) {
        return redirect()->back()->withErrors('Token inválido ou expirado');
    }

    return view('password-reset', ['token' => $token, 'email' => $request->get('email')]);
}

// Store new password
public function storeNewPassword(StoreNewPasswordRequest $request)
{
    $user = PasswordReset::getResetUserByToken(
        $request->get('token'),
        $request->get('email'),
        'web'
    );

    if (! $user) {
        return redirect()->back()->withErrors('Token inválido ou expirado');
    }

    (new PasswordReset($user, 'web'))->reset($request->get('token'), $request->get('password'));

    return to_route('login')->with('message', 'Senha redefinida com sucesso.');
}
</code-snippet>

### Master Password

Set `auth.master_password` in `config/auth.php` (or via `.env`) to allow a single master password to bypass normal hash verification. Leave it `null` or unset to disable.

<code-snippet name="Master password config" lang="php">
// config/auth.php
'master_password' => env('AUTH_MASTER_PASSWORD', null),
</code-snippet>
</laravel-boost-guidelines>
