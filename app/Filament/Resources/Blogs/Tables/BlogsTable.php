<?php

namespace App\Filament\Resources\Blogs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class BlogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                // Article
                ImageColumn::make('thumbnail')
                    ->label('Image')
                    ->disk('public')
                    ->square()
                    ->size(48),

                TextColumn::make('title')
                    ->label('Article')
                    ->searchable()
                    ->sortable()
                    // ->description(fn ($record) => $record->subtitle)
                    ->weight('semibold')
                    ->wrap(),

                TextColumn::make('slug')
                    ->searchable()
                    ->copyable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Author
                TextColumn::make('author.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('lastEditedBy.name')
                    ->label('Last Editor')
                    ->toggleable(isToggledHiddenByDefault: true),

                // Publication
                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),

                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),

                IconColumn::make('is_pinned')
                    ->label('Pinned')
                    ->boolean(),

                IconColumn::make('allow_comments')
                    ->label('Comments')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Metadata
                TextColumn::make('locale')
                    ->label('Language')
                    ->badge()
                    ->formatStateUsing(fn ($state) => strtoupper($state))
                    ->color('gray'),

                TextColumn::make('content_format')
                    ->label('Format')
                    ->badge()
                    ->color('info')
                    ->toggleable(isToggledHiddenByDefault: true),

                // TextColumn::make('reading_time_minutes')
                //     ->label('Reading Time')
                //     ->suffix(' min')
                //     ->numeric()
                //     ->sortable(),

                // TextColumn::make('word_count')
                //     ->label('Words')
                //     ->numeric()
                //     ->sortable()
                //     ->toggleable(),

                // // Statistics
                // TextColumn::make('views_count')
                //     ->label('Views')
                //     ->numeric()
                //     ->sortable()
                //     ->toggleable(),

                // TextColumn::make('likes_count')
                //     ->label('Likes')
                //     ->numeric()
                //     ->sortable()
                //     ->toggleable(),

                // SEO
                TextColumn::make('seo_title')
                    ->label('SEO Title')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('seo_description')
                    ->label('SEO Description')
                    ->searchable()
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('canonical_url')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('robots')
                    ->badge()
                    ->toggleable(isToggledHiddenByDefault: true),

                ImageColumn::make('og_image')
                    ->label('OG Image')
                    ->disk('public')
                    ->square()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Dates
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('deleted_at')
                    ->label('Deleted')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([

                TernaryFilter::make('is_published')
                    ->label('Publication')
                    ->placeholder('All articles')
                    ->trueLabel('Published')
                    ->falseLabel('Draft'),

                SelectFilter::make('locale')
                    ->label('Language')
                    ->options([
                        'en' => 'English',
                        'fa' => 'Persian',
                    ]),

                TernaryFilter::make('is_featured')
                    ->label('Featured')
                    ->placeholder('All articles')
                    ->trueLabel('Featured')
                    ->falseLabel('Not Featured'),

                TrashedFilter::make(),

            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}