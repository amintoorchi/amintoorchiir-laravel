<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Article Information')
                    ->columnSpanFull()
                    ->description('Manage the essential information and identification of your article.')
                    ->icon('heroicon-o-document-text')
                    ->columns([
                        'default' => 1,
                        'md' => 2,
                    ])
                    ->schema([
                        TextInput::make('title')
                            ->label('Article Title')
                            ->placeholder('Enter an engaging title...')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->columnSpanFull(),

                        TextInput::make('subtitle')
                            ->label('Subtitle')
                            ->placeholder('Add a short subtitle...')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TextInput::make('slug')
                            ->label('URL Slug')
                            ->placeholder('article-url-slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->prefix('/blogs/'),

                        Select::make('locale')
                            ->label('Language')
                            ->options([
                                'fa-IR' => 'Persian',
                                'en-US' => 'English',
                            ])
                            ->default('fa-IR')
                            ->required(),

                        Select::make('user_id')
                            ->label('Author')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),

                        Textarea::make('excerpt')
                            ->label('Article Excerpt')
                            ->placeholder('Write a short summary of your article...')
                            ->rows(3)
                            ->maxLength(1000)
                            ->columnSpanFull(),
                    ]),

                Section::make('Article Content')
                    ->columnSpanFull()
                    ->description('Create and format the main content of your article using Markdown.')
                    ->icon('heroicon-o-pencil-square')
                    ->schema([
                        MarkdownEditor::make('content')
                            ->label('Content')
                            ->placeholder('Start writing your article...')
                            ->required()
                            ->columnSpanFull(),

                        Select::make('content_format')
                            ->label('Content Format')
                            ->options([
                                'markdown' => 'Markdown',
                            ])
                            ->default('markdown')
                            ->required()
                            ->native(false),
                    ]),

                Section::make('Publishing')
                    ->description('Manage publication and reader interaction settings.')
                    ->icon('heroicon-o-globe-alt')
                    ->columns([
                        'default' => 1,
                        'md' => 2,
                    ])
                    ->schema([
                        Toggle::make('is_published')
                            ->label('Published')
                            ->helperText('Make this article publicly accessible.')
                            ->default(false),

                        Toggle::make('is_featured')
                            ->label('Featured Article')
                            ->helperText('Highlight this article in featured sections.')
                            ->default(false),

                        Toggle::make('is_pinned')
                            ->label('Pinned Article')
                            ->helperText('Keep this article at the top of listings.')
                            ->default(false),

                        Toggle::make('allow_comments')
                            ->label('Allow Comments')
                            ->helperText('Let readers leave comments on this article.')
                            ->default(false),
                    ]),

                Section::make('Featured Image')
                    ->description('Upload and configure the visual representation of your article.')
                    ->icon('heroicon-o-photo')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Article Thumbnail')
                            ->image()
                            ->disk('public')
                            ->directory('blogs/thumbnails')
                            ->imageEditor()
                            ->imagePreviewHeight('250')
                            ->maxSize(5120)
                            ->columnSpanFull(),

                        TextInput::make('thumbnail_alt')
                            ->label('Alternative Text')
                            ->placeholder('Describe the image for accessibility...')
                            ->maxLength(255),

                        TextInput::make('thumbnail_caption')
                            ->label('Image Caption')
                            ->placeholder('Add an optional image caption...')
                            ->maxLength(255),
                    ]),

                Section::make('Search Engine Optimization')
                    ->description('Optimize how your article appears in search engines and social media platforms.')
                    ->icon('heroicon-o-magnifying-glass')
                    ->collapsed()
                    ->columns(2)
                    ->schema([
                        TextInput::make('seo_title')
                            ->label('SEO Title')
                            ->placeholder('Custom title for search engines...')
                            ->maxLength(255),

                        TextInput::make('canonical_url')
                            ->label('Canonical URL')
                            ->placeholder('https://example.com/article')
                            ->url()
                            ->maxLength(2048),

                        Textarea::make('seo_description')
                            ->label('Meta Description')
                            ->placeholder('Write a concise search engine description...')
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpanFull(),

                        Select::make('robots')
                            ->label('Robots Directive')
                            ->options([
                                'index,follow' => 'Index, Follow',
                                'noindex,follow' => 'No Index, Follow',
                                'index,nofollow' => 'Index, No Follow',
                                'noindex,nofollow' => 'No Index, No Follow',
                            ])
                            ->default('index,follow')
                            ->native(false),

                        FileUpload::make('og_image')
                            ->label('Open Graph Image')
                            ->image()
                            ->disk('public')
                            ->directory('blogs/og-images')
                            ->imageEditor(),

                        KeyValue::make('seo_schema')
                            ->label('Structured Data')
                            ->keyLabel('Property')
                            ->valueLabel('Value')
                            ->addActionLabel('Add Property')
                            ->reorderable()
                            ->columnSpanFull(),
                    ]),

                Section::make('Additional Metadata')
                    ->description('Store custom key-value metadata associated with this article.')
                    ->icon('heroicon-o-code-bracket')
                    ->collapsed()
                    ->schema([
                        KeyValue::make('metadata')
                            ->label('Custom Metadata')
                            ->keyLabel('Key')
                            ->valueLabel('Value')
                            ->addActionLabel('Add Metadata')
                            ->reorderable()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
