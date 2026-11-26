# Lara Zeus Accordion (`lara-zeus/accordion`)

FilamentPHP v5 schema layout component and standalone Blade component for grouping fields or entries into collapsible accordions.

## Key Classes
- **Form/Schema Components**: `LaraZeus\Accordion\Forms\Accordions` (extends `Filament\Schemas\Components\Tabs`) and `LaraZeus\Accordion\Forms\Accordion` (extends `Filament\Schemas\Components\Tabs\Tab`)
- **Infolist Components**: `LaraZeus\Accordion\Infolists\Accordions` and `LaraZeus\Accordion\Infolists\Accordion`
- **Trait**: `LaraZeus\Accordion\Concerns\CanBeIsolated` (provides `->isolated(bool|Closure $condition = true)`)
- **Service Provider**: `LaraZeus\Accordion\AccordionServiceProvider` (`$name = 'zeus-accordion'`, registers views only)

## Rules & Anti-Patterns
- **No Filament Panel Plugin**: Do not register a panel plugin; use `Accordions` and `Accordion` directly inside Filament Form/Infolist schemas or use the Blade components.
- **1-based `activeAccordion()` index**: `->activeAccordion(int|Closure $activeAccordion)` expects a 1-based position (defaults to `1`), not `0` and not the accordion string ID when using the PHP `Accordions` component.
- **Use `->accordions([...])` with matching `Accordion` namespace**: Pass `LaraZeus\Accordion\Forms\Accordion` inside `Forms\Accordions` and `LaraZeus\Accordion\Infolists\Accordion` inside `Infolists\Accordions` (and use `->schema([...])` on each `Accordion` item).
- **Theme CSS scanning**: Include `./vendor/lara-zeus/accordion/resources/views/**/*.blade.php` in your Tailwind CSS sources so accordion utility classes are compiled.
